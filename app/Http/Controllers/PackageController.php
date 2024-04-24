<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\BusinessCategory;
use App\Traits\ImageUploadTrait; 


class PackageController extends Controller
{
    //
    use ImageUploadTrait;

    public function package(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
             
            Package::create([
                'name' => $data['name'],
                'price' => $data['price'],
                'free_items' => $data['free_items'],
                'paid_items' => $data['paid_items'],
            ]);

            return redirect()->route('dashboard')->with('success', 'Package added successfully');
        }

    }

    public function packageDestroy($id)
    {
        $id = base64_decode($id);
        $form = Package::find($id); 
        if ($form) {
        $form->delete(); 
        return redirect()->route('dashboard')->with('success', 'Package deleted successfully');
        } else {
        return redirect()->route('dashboard')->with('error', 'Package not found');
        }
    } 

    public function businessCategoryList()
    {
        $businessCategoryList = BusinessCategory::get()->toArray();
        return view('modules.business-category-list',compact('businessCategoryList'));
    }

    public function addBusinessCategory()
    {
        $categories = BusinessCategory::with('children')->whereNull('parent_id')->get();
    
        return view('modules.business-category',compact('categories'));
    }

    public function storeBusinessCategory(Request $request)
    {
        // dd('sadnaf');

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $businessCategory = new BusinessCategory;
        $businessCategory->name = $request->input('name');
        $businessCategory->parent_id = $request->input('parent_id');

        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $folderName = 'profile_images'; // Define the folder where you want to store the image
            $imageName = $this->uploadImage($image, $folderName); // Call the uploadImage method with the folder name
            
            $businessCategory->image = $imageName;
        }
        
        // dd($businessCategory);
        $businessCategory->save();

        return redirect()->route('businessCategoryList')->with('success', 'Business Category added successfully.');
    }

    public function businessCategorydelete($id)
    {
        $id = base64_decode($id);
        $deleteBusinessCategory = BusinessCategory::find($id); 
        if ($deleteBusinessCategory) {
        $deleteBusinessCategory->delete(); 
        return redirect()->route('businessCategoryList')->with('success', 'Business Category  deleted successfully');
        } else {
        return redirect()->route('businessCategoryList')->with('error', 'Package not found');
        }
    } 
}
