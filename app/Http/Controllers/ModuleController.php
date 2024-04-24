<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Currency;
use App\Models\City;
use App\Models\Location;
use App\Models\LocationList;
use App\Traits\ImageUploadTrait; 
use Illuminate\Validation\Rule;


class ModuleController extends Controller
{
    //
    use ImageUploadTrait;

    public function showrole()
    {
        $roles = Module::where('module','role')->get()->toArray();
        return view('admin.definations.role',compact('roles'));
    }

    public function submitRole(Request $request)
    {
        $request->validate([
            'role' => 'required|max:255',
        ]);

        $role = new Module;
        $role->role = $request->input('role');
        $role->module = 'role';
        $role->save();

        return redirect()->route('role')->with('success', 'Role added successfully');
    }

    public function roleDestroy($id)
    {
        $id = base64_decode($id);
        $user = Module::find($id); 
        if ($user) {
        $user->delete(); 
        return redirect()->route('role')->with('success', 'role deleted successfully');
        } else {
        return redirect()->route('role')->with('error', 'role not found');
        }
    }

    public function showOffers()
    {
        $offers = Module::where('module','offers')->get()->toArray();
        return view('admin.definations.offers',compact('offers'));
    }

    public function submitOffers(Request $request)
    {
        $request->validate([
            'user_offers' => 'required|max:255',
        ]);

        $role = new Module;
        $role->user_offers = $request->input('user_offers');
        $role->module = 'offers';
        $role->save();

        return redirect()->route('offers')->with('success', 'offers added successfully');
    }

    public function offersDestroy($id)
    {
        $id = base64_decode($id);
        $offer = Module::find($id); 
        if ($offer) {
        $offer->delete(); 
        return redirect()->route('offers')->with('success', 'offers deleted successfully');
        } else {
        return redirect()->route('offers')->with('error', 'offers not found');
        }
    }

    public function showInterests()
    {
        $interests = Module::where('module','user_interest')->get()->toArray();
        return view('modules.interests',compact('interests'));
    }


    public function submitInterests(Request $request)
    {
        $request->validate([
            'user_interests' => 'required|max:255',
        ]);

        // dd($request);
        $role = new Module;
        $role->user_interests = $request->input('user_interests');
        $role->module = 'user_interest';
        $role->save();

        return redirect()->route('interests')->with('success', 'interests added successfully');
    }

    public function interestsDestroy($id)
    {
        $id = base64_decode($id);
        $interest = Module::find($id); 
        if ($interest) {
        $interest->delete(); 
        return redirect()->route('interests')->with('success', 'interests deleted successfully');
        } else {
        return redirect()->route('interests')->with('error', 'interests not found');
        }
    }   

    public function showEvents()
    {
        $events = Module::where('module','event_type')->get()->toArray();
        return view('admin.definations.event-type',compact('events'));
    } 

    public function submitEvents(Request $request)
    {
        $request->validate([
            'user_event_type' => 'required|max:255',
        ]);

        // dd($request);
        $role = new Module;
        $role->user_event_type = $request->input('user_event_type');
        $role->module = 'event_type';
        $role->save();

        return redirect()->route('events')->with('success', 'events added successfully');
    }

    public function eventsDestroy($id)
    {
        $id = base64_decode($id);
        $event = Module::find($id); 
        if ($event) {
        $event->delete(); 
        return redirect()->route('events')->with('success', 'events deleted successfully');
        } else {
        return redirect()->route('events')->with('error', 'events not found');
        }
    } 
    
    public function showform()
    {
        $forms = Module::where('module','form_type')->get()->toArray();
        return view('admin.definations.form-type',compact('forms'));
    }

    public function submitform(Request $request)
    {
        $request->validate([
            'user_form_type' => 'required|max:255',
        ]);

        // dd($request);
        $role = new Module;
        $role->user_form_type = $request->input('user_form_type');
        $role->module = 'form_type';
        $role->save();

        return redirect()->route('form')->with('success', 'form added successfully');
    }

    public function formDestroy($id)
    {
        $id = base64_decode($id);
        $form = Module::find($id); 
        if ($form) {
        $form->delete(); 
        return redirect()->route('form')->with('success', 'form deleted successfully');
        } else {
        return redirect()->route('form')->with('error', 'form not found');
        }
    } 

    public function currencyform()
    {
        $currencys = Currency::get()->toArray();
        return view('modules.currency',compact('currencys'));
    }

    public function submitcurrency(Request $request)
    {
        $request->validate([
            'currency' => 'required|max:255',
        ]);

        // dd($request);
        $role = new Currency;
        $role->currency = $request->input('currency');
        $role->save();

        return redirect()->route('currency')->with('success', 'currency added successfully');
    }

    public function currencyDestroy($id)
    {
        $id = base64_decode($id);
        $form = Currency::find($id); 
        if ($form) {
        $form->delete(); 
        return redirect()->route('currency')->with('success', 'currency deleted successfully');
        } else {
        return redirect()->route('currency')->with('error', 'currency not found');
        }
    } 


    public function cityList()
    {
        $cities = Location::all();
        return view('admin.definations.top-city',compact('cities'));
    }

    public function addCity()
    {
        return view('admin.definations.city');
    }

    public function storeCity(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for image upload
        ]);

        $city = new Location;
        $city->name = $request->input('name');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $folderName = 'profile_images'; // Define the folder where you want to store the image
            $imageName = $this->uploadImage($image, $folderName); // Call the uploadImage method with the folder name

            $city->image = $imageName;
        }

        $city->save();

        return redirect()->route('cityList')->with('success', 'City added successfully.');
    }

    public function cityDestroy($id)
    {
        $id = base64_decode($id);
        $form = City::find($id); 
        if ($form) {
        $form->delete(); 
        return redirect()->route('cityList')->with('success', 'city deleted successfully');
        } else {
        return redirect()->route('cityList')->with('error', 'city not found');
        }
    } 

    public function locationList()
    {
        return view('admin.definations.top-location');
    }

    public function addLocation()
    {
        $topCities = Location::all();
        // dd($topCities);
        return view('admin.definations.location',compact('topCities'));
    }

    public function storeLocation(Request $request)
    {

        if($request->isMethod('post'))
        {
            // dd('msdnfhmfsjkf');
            $request->validate([
                'name' => 'required|string|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for image upload
            ]);

            // dd($request->all());
    
            $location = new LocationList;
            $location->name = $request->input('name');
            $location->locations_id = $request->input('location_id');
    
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $folderName = 'profile_images'; // Define the folder where you want to store the image
                $imageName = $this->uploadImage($image, $folderName); // Call the uploadImage method with the folder name
    
                $location->image = $imageName;
            }
    
            $location->save();
    
            return redirect()->route('locationList')->with('success', 'Location added successfully.');

        }
    }


}
