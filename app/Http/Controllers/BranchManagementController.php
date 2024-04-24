<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Branch;
use App\Models\Business;
use App\Models\BusinessImageGallery;
use App\Models\BusinessWorkingHour;
use App\Models\SocialMediaLink;
use App\Models\BusinessCategory;
use App\Traits\AuthHelperTrait;
use App\Traits\ImageUploadTrait; 
class BranchManagementController extends Controller
{
    use AuthHelperTrait;
    use ImageUploadTrait;

    public function branchList()
    {
        $userId = $this->getAuthenticatedUserId();
        $branches = Branch::where('user_id',$userId)->get()->toArray();
        return view('customer.branchList',compact('branches'));
    }

    public function addBranch()
    {
        return view('customer.addbranch');
    }

    public function storeBranch(Request $request)
    {                                             
        $userId = $this->getAuthenticatedUserId();
        $branch = new Branch;
        $branch->branchName = $request->input('branchName');
        $branch->user_id = $userId;
        $branch->branchNameArabic = $request->input('branchNameArabic');
        $branch->region = $request->input('region');
        $branch->city = $request->input('city');
        $branch->state = $request->input('state');
        $branch->street = $request->input('street');
        $branch->phone_no = $request->input('phone_no');
        $branch->mobile_no = $request->input('mobile_no');
        $branch->whatsapp_no = $request->input('whatsapp_no');
        $branch->mapIframe = $request->input('mapIframe');
        $branch->zip_code = $request->input('zip_code');
        $branch->save(); 
        return redirect()->route('branchList');
    }

    public function branchUpdate(Request $request,$id)
    {
        $id = base64_decode($id);
        // dd($id);
        $branch = Branch::find($id);

        if ($request->isMethod('post')) {
            // Update the branch record
            $branch->branchName = $request->input('branchName');
            $branch->branchNameArabic = $request->input('branchNameArabic');
            $branch->region = $request->input('region');
            $branch->city = $request->input('city');
            $branch->state = $request->input('state');
            $branch->street = $request->input('street');
            $branch->phone_no = $request->input('phone_no');
            $branch->mobile_no = $request->input('mobile_no');
            $branch->whatsapp_no = $request->input('whatsapp_no');
            $branch->mapIframe = $request->input('mapIframe');
            $branch->zip_code = $request->input('zip_code');
            $branch->save();
            return redirect()->route('branchList')->with('success', 'Branch updated successfully.');
        }

        return view('customer.editbranch',compact('branch'));
    }



    public function branchDestroy(Request $request, $id)
    {
        $id = base64_decode($id);
        $branch = Branch::find($id);

        if (!$branch) {
            return redirect()->route('branchList')->with('error', 'Branch not found.');
        }
        // Delete the branch record
        $branch->delete();

        return redirect()->route('branchList')->with('success', 'Branch deleted successfully.');
    }

    public function businessList()
    {
        $userId = $this->getAuthenticatedUserId();
        $businesslist = Business::where('user_id',$userId)->get()->toArray();
        return view('customer.business-list',compact('businesslist'));
    }

    public function getSubcategories($categoryId)
    {
        $subcategories = BusinessCategory::where('parent_id', $categoryId)->get();

        return response()->json($subcategories);
    }


    public function addBusiness()
    {
        $businessCategory = BusinessCategory::all()->whereNull('parent_id');
        // dd($businessCategory);
        return view('customer.add-business',compact('businessCategory'));
    }

    public function viewBusinessdetails($id)
    {
        $id = base64_decode($id);
        $imageGallery = Business::where('id',$id)->with('imageGallery')->first();
        return view('customer.view-business-detail',compact('imageGallery'));
    }

    public function storeBusiness(Request $request)
    {
        // dd($request);
        $userId = $this->getAuthenticatedUserId();

        $request->validate([
            'business_logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'slogan' => 'required|string|max:255',
            'hq' => 'required|string|max:255',
            'about' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'sub_category' => 'required|string|max:255',
            'email_address' => 'required|string|max:255',
            'phone_no' => 'required|string|max:255',
            'keywords' => 'required|string|max:255',
            'website' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'whats_app_no' => 'required|string|max:255',
            'tax_no' => 'required|string|max:255',
            'registration_no' => 'required|string|max:255',
        ]);
    
        $business_logo = null;
        if ($request->hasFile('business_logo')) {
            $image = $request->file('business_logo');
            $business_logo = $this->uploadmedia($image, 'business_logo');
        }

        $cover_image = null;
        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');
            $cover_image = $this->uploadmedia($image, 'cover_image');
        }

        $tax_doc_image = null;
        if ($request->hasFile('tax_doc_image')) {
            $image = $request->file('tax_doc_image');
            $tax_doc_image = $this->uploadmedia($image, 'tax_doc_image');
        }

        $reg_doc_image = null;
        if ($request->hasFile('reg_doc_image')) {
            $image = $request->file('reg_doc_image');
            $reg_doc_image = $this->uploadmedia($image, 'reg_doc_image');
        }

        $business = new Business;
        $business->business_logo = $business_logo;
        $business->cover_image =  $cover_image;
        $business->tax_doc_image = $tax_doc_image;
        $business->reg_doc_image =  $reg_doc_image;
        $business->name = $request->input('name');
        $business->country = $request->input('country');
        $business->slogan = $request->input('slogan');
        $business->hq = $request->input('hq');
        $business->about = $request->input('about');
        $business->category = $request->input('category');
        $business->sub_category = $request->input('sub_category');
        $business->email_address = $request->input('email_address');
        $business->phone_no = $request->input('phone_no');
        $business->keywords = $request->input('keywords');
        $business->website = $request->input('website');
        $business->address = $request->input('address');
        $business->whats_app_no = $request->input('whats_app_no');
        $business->tax_no = $request->input('tax_no');
        $business->registration_no = $request->input('registration_no');
        $business->user_id = $userId;
        $business->save();

        // Add Photos Gallary
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Generate a unique filename for each image
                $filename = uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();
        
                // Store the file in the 'public/storage/media' directory
                $image->storeAs('media', $filename, 'public');
        
                // Create a new BusinessImageGallery record for each image
                $businessImageGallary = new BusinessImageGallery;
                $businessImageGallary->user_id = $userId;
                $businessImageGallary->business_id = $business->id;
                // Save the file path (public URL) in the image field
                $businessImageGallary->image = $filename;
                $businessImageGallary->save();
            }
        }

        $days = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
        $rules = [];
        
        foreach ($days as $day) {
            $rules[$day . '_morning'] = 'required';
            $rules[$day . '_afternoon'] = 'required';
            $rules[$day . '_evening'] = 'required';
            $rules[$day . '_night'] = 'required';
        }

        $this->validate($request, $rules);

        // Save the working hours data for each day
        foreach ($days as $day) {
            $workingHours = new BusinessWorkingHour();
            $workingHours->day = ucfirst($day); // Capitalize the day
            $workingHours->morning = $request->input($day . '_morning');
            $workingHours->afternoon = $request->input($day . '_afternoon');
            $workingHours->evening = $request->input($day . '_evening');
            $workingHours->night = $request->input($day . '_night');
            $workingHours->user_id = $userId;
            $workingHours->business_id = $business->id;
            $workingHours->save();
        }


        // Social Media Links
        $addSocialMediaLinks = new SocialMediaLink;
        $addSocialMediaLinks->user_id = $userId;
        $addSocialMediaLinks->business_id = $business->id;
        $addSocialMediaLinks->facebook =  $request->input('facebook');
        $addSocialMediaLinks->twitter =  $request->input('twitter');
        $addSocialMediaLinks->instagram =  $request->input('instagram');
        $addSocialMediaLinks->youtube =  $request->input('youtube');
        $addSocialMediaLinks->pinterest =  $request->input('pinterest');
        $addSocialMediaLinks->save();
    
        return redirect()->route('businessList')->with('success', 'Business created successfully');
    }

    public function businessdelete(Request $request, $id)
    {
        $id = base64_decode($id);
        $business = Business::find($id);

        if (!$business) {
            return redirect()->route('businessList')->with('error', 'business not found.');
        }
        // Delete the branch record
        $business->delete();

        return redirect()->route('businessList')->with('success', 'business deleted successfully.');
    }
}
