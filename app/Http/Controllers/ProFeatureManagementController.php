<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\ProFeature;
use App\Models\Magzine;
use App\Models\Post;
use App\Models\Event;
use App\Models\Module;
use App\Models\Customer;
use App\Traits\ImageUploadTrait; 
use App\Traits\AuthHelperTrait;
use Toastr;


class ProFeatureManagementController extends Controller
{
    use ImageUploadTrait;
    use AuthHelperTrait;

    public function offerList()
    {
        $userId = $this->getAuthenticatedUserId();
        $offers = Offer::where('user_id',$userId)->get()->toArray();
        // dd($offers);
        return view('customer.offer.listing',compact('offers'));
    }

    public function addOffer(Request $request)
    {
        $userId = $this->getAuthenticatedUserId();
        if($request->isMethod('post')){
            $imageFilename = null;
            if ($request->hasFile('coupon_image')) {
                $image = $request->file('coupon_image');
                $imageFilename = $this->uploadImage($image, 'profile_images'); 
            }

            Offer::create([
                'description' => $request->input('description'),
                'type' => $request->input('type'),
                'title' => $request->input('title'),
                'user_id' =>$userId,
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'coupon' => $request->input('coupon'),
                'coupon_image' => $imageFilename,
            ]);

            return redirect()->route('offerList')->with('success', 'offer added successfully');
        }
        return view('customer.offer.index');
    }

    public function deleteOffer(Request $request, $id)
    {
        $id = base64_decode($id);
        $member = Offer::find($id);
        $member->delete();

        return redirect()->route('offerList')->with('success', 'Offer deleted successfully.');
    }

    public function delievryNetworkList()
    {
        $userId = $this->getAuthenticatedUserId();
        $delievryNetworks = ProFeature::where('user_id',$userId)->where('type','delivery_network')->get()->toArray();
        // dd($delievryNetworks);
        return view('customer.ProFeatures.delievryNetworkList',compact('delievryNetworks'));
    }

    public function addDelievryNetwork(Request $request)
    {
        $userId = $this->getAuthenticatedUserId();

        if($request->isMethod('post')){
            $imageFilename = null;
            if ($request->hasFile('media')) {
                $image = $request->file('media');
                $imageFilename = $this->uploadmedia($image, 'media'); 
            }

            ProFeature::create([
                'title' => $request->input('title'),
                'user_id' => $userId, 
                'type' => 'delivery_network', 
                'media' => $imageFilename,
            ]);
            
            return redirect()->route('delievryNetworkList')->with('success', 'Delievry Network added successfully');

        }
        return view('customer.ProFeatures.addDelievryNetwork');
    }

    public function deleteDelievry(Request $request, $id)
    {
        $id = base64_decode($id);
        $deleteDelievry = ProFeature::find($id);
        $deleteDelievry->delete();

        return redirect()->route('delievryNetworkList')->with('success', 'Delievry Network deleted successfully.');
    }

    public function ourPartnerlist()
    {
        $userId = $this->getAuthenticatedUserId();
        $ourPartners = ProFeature::where('user_id',$userId)->where('type','our_partner')->get()->toArray();
        return view('customer.ProFeatures.ourPartnerList',compact('ourPartners'));
    }

    public function addPartner(Request $request)
    {
        $userId = $this->getAuthenticatedUserId();
        if($request->isMethod('post')){
            $imageFilename = null;
            if ($request->hasFile('media')) {
                $image = $request->file('media');
                $imageFilename = $this->uploadmedia($image, 'media'); 
            }

            ProFeature::create([
                'title' => $request->input('title'),
                'user_id' => $userId, 
                'type' => 'our_partner', 
                'media' => $imageFilename,
            ]);
            
            return redirect()->route('ourPartnerlist')->with('success', 'Our Partner added successfully');

        }
        return view('customer.ProFeatures.addPartner');
    }

    public function deletePartner($id)
    {
        $id = base64_decode($id);
        $deletePartner = ProFeature::find($id);
        $deletePartner->delete();

        return redirect()->route('ourPartnerlist')->with('success', 'Our Partner deleted successfully.');
    }


    public function bulletinlist()
    {
        $userId = $this->getAuthenticatedUserId();
        $bulletins = ProFeature::where('user_id',$userId)->where('type','bulletin')->get()->toArray();
        return view('customer.ProFeatures.bulletinList',compact('bulletins'));
    }

    public function addBulletin(Request $request)
    {
        $userId = $this->getAuthenticatedUserId();
        if($request->isMethod('post')){
            $imageFilename = null;
            if ($request->hasFile('media')) {
                $image = $request->file('media');
                $imageFilename = $this->uploadmedia($image, 'media'); 
            }

            ProFeature::create([
                'title' => $request->input('title'),
                'user_id' => $userId, 
                'type' => 'bulletin', 
                'media' => $imageFilename,
            ]);
            
            return redirect()->route('bulletinlist')->with('success', 'bulletin added successfully');

        }
        return view('customer.ProFeatures.addBulletin');
    }

    public function deleteBulletin($id)
    {
        $id = base64_decode($id);
        $deletebulletins = ProFeature::find($id);
        $deletebulletins->delete();

        return redirect()->route('bulletinlist')->with('success', 'bulletin deleted successfully.');
    }

    public function magzinelist()
    {
        $userId = $this->getAuthenticatedUserId();
        $magzines = Magzine::where('user_id',$userId)->get()->toArray();
        return view('customer.ProFeatures.magzineList',compact('magzines'));
    }

    public function addMagzine(Request $request)
    {

        $userId = $this->getAuthenticatedUserId();
        if($request->isMethod('post')){
            $imageFilename = null;
            if ($request->hasFile('media')) {
                $image = $request->file('media');
                $imageFilename = $this->uploadmedia($image, 'media'); 
            }

            Magzine::create([
                'title' => $request->input('title'),
                'user_id' => $userId,
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'media' => $imageFilename,
            ]);
            
            return redirect()->route('magzinelist')->with('success', 'Magzine added successfully');

        }
        return view('customer.ProFeatures.addMagzine');
    }

    public function deleteMagzine($id)
    {
        $id = base64_decode($id);
        $deletemagzine = Magzine::find($id);
        $deletemagzine->delete();

        return redirect()->route('magzinelist')->with('success', 'Magzine deleted successfully.');
    }

    public function postlist()
    {
        $userId = $this->getAuthenticatedUserId();
        $posts = Post::where('user_id',$userId)->get()->toArray();
        return view('customer.ProFeatures.post-list',compact('posts'));
    }

    public function addPost(Request $request)
    {
        $userId = $this->getAuthenticatedUserId();
        if($request->isMethod('post')){
            $imageFilename = null;
            if ($request->hasFile('image_path')) {
                $image = $request->file('image_path');
                $imageFilename = $this->uploadmedia($image, 'image_path'); 
            }

            Post::create([
                'title' => $request->input('title'),
                'user_id' =>$userId,
                'description' => $request->input('description'),
                'Caption' => $request->input('Caption'),
                'image_path' => $imageFilename,
            ]);
            
            return redirect()->route('postList')->with('success', 'Post added successfully');

        }
        return view('customer.ProFeatures.add-post');
    }

    public function deletePost($id)
    {
        $id = base64_decode($id);
        $deletePost = Post::find($id);
        $deletePost->delete();

        return redirect()->route('postList')->with('success', 'Post deleted successfully.');
    }

    public function eventList()
    {
        $userId = $this->getAuthenticatedUserId();
        // dd($userId);
        $eventList = Event::where('user_id',$userId)->get()->toArray();
        return view('customer.ProFeatures.event-list',compact('eventList'));
    }

    public function addEvent(Request $request)
    {
        $userId = $this->getAuthenticatedUserId();
       $events =Module::where('module','event_type')->get()->toArray();
            //    dd($event);
        if($request->isMethod('post')){
            $imageFilename = null;
            if ($request->hasFile('media')) {
                $image = $request->file('media');
                $imageFilename = $this->uploadmedia($image, 'media'); 
            }
            // dd($request);

            Event::create([
                'title' => $request->input('title'),
                'user_id' => $userId,
                'location' => $request->input('location'),
                'event_id' => $request->input('type'),
                'address' => $request->input('address'),
                'mapiframe' => $request->input('mapiframe'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'start_time' => $request->input('start_time'),
                'end_time' => $request->input('end_time'),
                'media' => $imageFilename,
            ]);
            
            return redirect()->route('eventList')->with('success', 'Event added successfully');

        }
        return view('customer.ProFeatures.add-event',compact('events'));
    }

    public function deleteEvent($id)
    {
        $id = base64_decode($id);
        $deleteEvent = Event::find($id);
        $deleteEvent->delete();

        return redirect()->route('eventList')->with('success', 'Event deleted successfully.');
    }
}
