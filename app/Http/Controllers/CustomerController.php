<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Customer;
use App\Models\Member;
use App\Traits\ImageUploadTrait; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Rules\RequiredIfAnyRule;
use Toastr;


class CustomerController extends Controller
{

    use ImageUploadTrait;


    public function dashboardCustomer()
    {
        return view('customer.dashboard');
    }

    public function showRegistrationForm()
    {
        return view('customer.registor');
    }

    public function showloginForm()
    {
        return view('customer.login');
    }

    public function register(Request $request)
    {
        // dd('done');
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'phone_no' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new customer
        $customer = new Customer;
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->phone_no = $request->input('phone_no');
        $customer->password = Hash::make($request->input('password'));
        $customer->save();

        return redirect()->route('customer.login');
    }

  
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            if (isset($request->email) && isset($request->password)) {
                // $remember_me = $request->has('remember_me') ? true : false;
                $admin = Customer::where('email', $request->email)->first();
                // dd($admin);
                if (isset($admin) && !empty($admin)) {
                    $password = $admin->password;
                    if (Hash::check($request->password, $admin->password)) {
                        // dd('done');
                        if (Auth::guard('customers')->attempt(['email' => $request->email, 'password' => $request->password])) {
                            // dd($admin['remember_token']);
                            // dd('done');
                            Session::flash('success', 'Login success');
                            return redirect('/customer/dashboard');
                        }
                    } else {
                        Session::flash('error', 'Wrong Password');
                        return redirect()->back();
                    }
                } else {
                    Session::flash('error', 'Email Unregistered');
                    return redirect()->back();
                }
            } else {
                return redirect()->back();
            }
        }
        
    }

    public function logoutCustomerpanel()
    {
        Auth::guard('customers')->logout();
        Session::flash('success', 'Logout');
        return redirect()->route('customer.login');
    }

    public function profileUpdate(Request $request)
    {
        $user = Auth::guard('customers')->user();

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageFilename = $this->uploadImage($image, 'profile_images');
        
            if ($user->profile_image) {
                // Delete the previous image if it exists
                $imagePath = public_path($user->profile_image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        
            $user->profile_image = $imageFilename;
            $user->save();
        }
        
        // Handle password update
        if ($request->hasAny(['new_password', 'password_confirmation'])) {
            $request->validate([
                'new_password' => 'required|min:8',
                'password_confirmation' => 'required|same:new_password',
            ]);
    
            $hashedNewPassword = Hash::make($request->input('password'));
    
            $user->update([
                'password' => $hashedNewPassword,
            ]);
    
            return redirect()->route('customer.dashboard')->with('success', 'Password updated successfully.');
        }

        return view('customer.profile');
    }

    public function memberList()
    {
        $members = Member::get()->toArray();
        // dd($members);
        return view('customer.memberList',compact('members'));
    }

    public function addMember()
    {
        return view('customer.addMember');
    }

    
    public function storeMember(Request $request)
    {

        $imageFilename = null;
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageFilename = $this->uploadImage($image, 'profile_images'); 
        }

        Member::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'title' => $request->input('title'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'role' => $request->input('role'),
            'mobile' => $request->input('mobile'),
            'profile_image' => $imageFilename,
        ]);

        return redirect()->route('memberList')->with('success', 'Member added successfully');
    }

    public function memberUpdate(Request $request,$id)
    {
        $id = base64_decode($id);
        $editMember = Member::find($id);
        // dd($id);
        if ($request->isMethod('post')) {
                $imageFilename = null;
                if ($request->hasFile('profile_image')) {
                    $image = $request->file('profile_image');
                    $imageFilename = $this->uploadImage($image, 'profile_images'); 
                }
                $editMember->name = $request->input('name');
                $editMember->email = $request->input('email');
                $editMember->title = $request->input('title');
                $editMember->address = $request->input('address');
                $editMember->phone = $request->input('phone');
                $editMember->role = $request->input('role');
                $editMember->mobile = $request->input('mobile');
                $editMember->profile_image = $imageFilename;
                $editMember->save();
    
                return redirect()->route('memberList')->with('success', 'Member updated successfully.');
            }

        return view('customer.editMember',compact('editMember'));
    }

    public function memberdelete(Request $request, $id)
    {
        $id = base64_decode($id);
        $member = Member::find($id);

        if (!$member) {
            return redirect()->route('memberList')->with('error', 'Member not found.');
        }

        // Delete the branch record
        $member->delete();

        return redirect()->route('memberList')->with('success', 'Member deleted successfully.');
    }

}
