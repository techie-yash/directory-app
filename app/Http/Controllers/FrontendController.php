<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BusinessCategory;
use App\Models\Business;
use App\Models\Event;
use App\Models\Post;
use App\Models\Offer;
use App\Models\Module;
use App\Models\Cms;
use App\Models\AboutUs;
use App\Models\Terms;
use App\Models\Location;
use App\Models\LocationList;
use App\Models\Magzine;
use App\Models\Branch;
use App\Models\Product;
use App\Models\Review;
use Jorenvh\Share\ShareFacade as Share;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
    class FrontendController extends Controller
{
    //
    public function webpage()
    {
        $businessCategory = BusinessCategory::with('children')->whereNull('parent_id')->get();
        // dd($businessCategory);
        $posts = Post::with('business')->latest()->take(4)->get();
        $events = Event::with('event','business')->latest()->get();       
        $offers   = Offer::with('business')->latest()->take(4)->get();
        $topCitys = Location::with('locationLists')->withCount('locationLists')->get();
        $trendingCompanies = Business::with('businessCategory')->get()->groupBy('user_id');
        // dd($trendingCompanies);
        $products = Product::with('category','business')->get();
        return view('frontend.ui',compact('businessCategory','posts','events','offers','topCitys','products','trendingCompanies'));
    }

    public function uiDirectory($id,$name)
    {
        $name = $name;
        // dd($name);
        $decodedId = base64_decode($id);
        $topOffers = Offer::all();
        $businessCategories = BusinessCategory::with('children')->whereNull('parent_id')->get();
        $business = Business::where('category',$decodedId)->with('businessCategory')->get()->toArray();  
        // dd($business);        

        return view('frontend.directory',compact('business','name','topOffers','businessCategories'));
    }

    public function getBusinessListings(Request $request)
    {
        $category = $request->input('category');
        $businessListings = Business::where('category', $category)->with('businessCategory')->get();
        return response()->json(['businessListings' => $businessListings]);
    }

    public function directoryView($id)
    {
        $id = base64_decode($id);
        $view = Business::with('businessCategory','workingHours','imageGallery','videos','delivery','ourPartner')->find($id);
        // dd($view);
        $view->increment('views');
        $shareComponent = Share::page(
            url()->current(),
            'Your share text comes here',
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->telegram()
        ->whatsapp()
        ->reddit();
    
        return view('frontend.view-directory', compact('view', 'shareComponent'));
    }

    public function uiOffers($id)
    {
        $id =base64_decode($id);
        $uiOffers = Business::with('businessCategory','imageGallery')->find($id);
        // dd($id);
        return view('frontend.offers',compact('uiOffers'));
    }

    public function uiMenu($id)
    {
        $id =base64_decode($id);
        $uiMenu = Business::with('businessCategory','imageGallery')->find($id);
        // dd($view);
        return view('frontend.menu',compact('uiMenu'));
    }

    public function uiMagazine($id)
    {
        $id =base64_decode($id);
        $uiMagazine = Business::with('businessCategory','imageGallery')->find($id);
        $magzineList  = Magzine::all();
        // dd($magzineList);
        return view('frontend.magazine',compact('uiMagazine','magzineList'));
    }

    public function uiEvents($id)
    {
        $id =base64_decode($id);
        $uiEvents = Business::with('businessCategory','imageGallery')->find($id);
        $eventList = Event::with('event')->get();
        // dd($eventList);
        return view('frontend.events',compact('uiEvents','eventList'));
    }

    public function viewEvent($id)
    {
        $id = base64_decode($id);
        $eventView = Event::find($id);
        $eventView->increment('views','imageGallery');
        // dd($postView);
        return view('frontend.view-event',compact('eventView'));
    }

    public function uiForms($id)
    {
        $id =base64_decode($id);
        $uiForms = Business::with('businessCategory','imageGallery')->find($id);
        return view('frontend.forms',compact('uiForms'));
    }

    public function uiProducts($id)
    {
        $id =base64_decode($id);
        $uiProducts = Business::with('businessCategory','imageGallery')->find($id);
        $productList = Product::with('category','business')->get();
        // dd($productList);
        return view('frontend.products',compact('uiProducts','productList'));
    }

    public function uiBranches($id)
    {
        $id =base64_decode($id);
        $uiBranches = Business::with('businessCategory','imageGallery')->find($id);
        $branchList = Branch::all();

        return view('frontend.branches',compact('uiBranches','branchList'));
    }

    public function uiPost($id)
    {
        $id =base64_decode($id);
        $uiPost = Business::with('businessCategory','imageGallery')->find($id);
        $uiPostList = Post::all();
        // dd($uiPostList);
        return view('frontend.post',compact('uiPost','uiPostList'));
    }

    public function viewPost($id)
    {
        $id = base64_decode($id);
        $postView = Post::find($id);
        $postView->increment('views');
        // dd($postView);
        return view('frontend.view-post',compact('postView'));
    }


    public function uiReview($id)
    {
        $id =base64_decode($id);
        $uiReview = Business::with('businessCategory','imageGallery')->find($id);
        $reviews = Review::where('business_id',$id)->with('user')->get();
        // dd($review);
        return view('frontend.review',compact('uiReview','reviews'));
    }


    public function addReview(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'review' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Review::create([
            'user_id' => auth()->user()->id,
            'business_id' => $request->input('product_id'),
            'review' => $request->input('review'),
            'rating' => $request->input('rating'),
        ]);

        return redirect()->back()->with('Review Added Successfully');

        // Redirect or return a response
    }

    public function aboutUs()
    {
        $aboutUs = AboutUs::where('type','about_us')->first();
        return view('frontend.about',['aboutUs' => $aboutUs]);
    }

    public function terms()
    {
        $terms = Terms::first();
        return view('frontend.terms',['terms' => $terms]);
    }

    public function faq()
    {
        $faqs = Cms::all();
        return view('frontend.faq',['faqs' => $faqs]);
    }

    public function contacUs()
    {
        return view('frontend.contact');
    }

    public function pricing()
    {
        return view('frontend.pricing');
    }

    public function advertiseWithUs()
    {
        return view('frontend.advertise');
    }

    public function viewLocations($id,$slug)
    {
        $id = base64_decode($id);
        $name = $slug ;
        $locationListings = LocationList::where('locations_id',$id)->get();
        // dd($locationListings);
        $topOffers = Offer::with('business')->get();
        return view('frontend.view-locations',compact('locationListings','topOffers','name'));
    }


}
