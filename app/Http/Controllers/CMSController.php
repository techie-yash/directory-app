<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cms;
use App\Models\AboutUs;
use App\Models\Terms;
use App\Models\Feature;
use Illuminate\Validation\Rule;

class CMSController extends Controller
{

    public function index()
    {
        $faqs = Cms::all();
        return view('admin.pages.faq', compact('faqs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Cms::create($request->all());

        return redirect()->route('faq.index');
    }

    public function destroy($id)
    {
        $id = base64_decode($id);
        Cms::findOrFail($id)->delete();
        return redirect()->route('faq.index');
    }

    public function about()
    {
        $aboutUs = AboutUs::firstOrNew();

        return view('admin.pages.about', compact('aboutUs'));
    }

    public function updateAboutUs(Request $request)
    {
        $aboutUs = AboutUs::where('type','about_us')->firstOrNew();
        $aboutUs->type = 'about_us';
        $aboutUs->about_us_title = $request->input('about_us_title');
        $aboutUs->about_us_description = $request->input('about_us_description');
        $aboutUs->who_we_are = $request->input('who_we_are');
        $aboutUs->service1 = $request->input('service1');
        $aboutUs->service2 = $request->input('service2');
        $aboutUs->service3 = $request->input('service3');

        $aboutUs->save();

        return redirect()->route('about.index')->with('success', 'About Us content updated successfully.');
    }


    public function showForm()
    {
        $contactUs = AboutUs::where('type','contact_us')->firstOrNew();
        // dd($contactUs);
        return view('admin.pages.contact',compact('contactUs'));
    }


    public function submitForm(Request $request)
    {
        $validatedData = $request->validate([
            'office_address' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'map_iframe' => 'required|string',
        ]);
    
        $contact = AboutUs::where('type','contact_us')->firstOrNew();
        $contact->office_address = $validatedData['office_address'];
        $contact->email = $validatedData['email'];
        $contact->type = 'contact_us';
        $contact->phone = $validatedData['phone'];
        $contact->map_iframe = $validatedData['map_iframe'];
        $contact->save();
    
        return redirect()->route('contact')->with('success', 'Your message has been sent!');
    }

    public function addFeatures(Request $request)
    {
        $features = Feature::all();

        return view('cms.add-features',compact('features'));
    }

    
    public function storefeatures(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Feature::create(['name' => $request->name]);

        return redirect()->route('addFeatures');
    }
    

    public function destroyfeatures($id)
    {
        $id = base64_decode($id);
        Feature::destroy($id);
        return redirect()->route('addFeatures');
    }

    public function terms()
    {
        $term = Terms::firstOrNew();
        return view('cms.terms',['term' => $term]);
    }

    public function updateTerms(Request $request)
    {
        // dd('sndfsm');
        $terms = Terms::firstOrNew();
        $terms->description = $request->input('description');
        $terms->save();
        return redirect()->route('terms.update')->with('success', 'Terms content updated successfully.');
    }

}
