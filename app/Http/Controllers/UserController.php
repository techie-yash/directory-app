<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\BusinessCategory;
use App\Models\Business;
use App\Traits\ImageUploadTrait; 
use App\Traits\AuthHelperTrait;
use Illuminate\Support\Str;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    use ImageUploadTrait;    
    use AuthHelperTrait;

    // public function webpage()
    // {
    //     $BusinessCategory = BusinessCategory::get();
    //     return view('web-page',compact('BusinessCategory'));
    // }

    // public function webpage()
    // {
    //     $BusinessCategory = BusinessCategory::get();
    //     return view('ui',compact('BusinessCategory'));
    // }


    public function webView($id)
    {
        $id = base64_decode($id);

        $business = Business::where('category',$id)->get();
        // dd($business);
        return view('web-view',compact('business'));
    }


    public function user()
    {
        $users = User::all(); 
        // dd($users);
        return view('UserManagement.user',compact('users'));
    }


    public function addUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'country' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'role' => ['required', Rule::in(['admin', 'editor', 'viewer'])],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $randomPassword = Str::random(8);

        $imageFilename = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageFilename = $this->uploadImage($image, 'profile_images'); 
        }

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'country' => $request->input('country'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'role' => $request->input('role'),
            'image' => $imageFilename,
            'password' => bcrypt($randomPassword), 
        ]);

        return redirect()->route('user')->with('success', 'User added successfully');
    }

    public function update(Request $request,$id)
    {

        $id = base64_decode($id);
        $editUser = User::find($id);

        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);
            User::where('id', $id)->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'country' => $data['country'],
                'address' => $data['address'],
                'phone' => $data['phone'],
                'role' => $data['role'],
            ]);
        
            return redirect()->route('user')->with('success', 'User Details Updated successfully');
        }
        return view('UserManagement.editUser',compact('editUser'));
    }

    public function destroy($id)
    {
        $id = base64_decode($id);
        $user = User::find($id); 
        if ($user) {
        $user->delete(); 
        return redirect()->route('user')->with('success', 'User deleted successfully');
        } else {
        return redirect()->route('user')->with('error', 'User not found');
        }
    }   


    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/login');
    }

    public function dashboardUserPanel()
    {
        return view('UserPanel.dashboard');
    }

    public function userPanelLogin()
    {
        return view('UserPanel.user-login');
    }

    public function userPanelRegister(Request $request)
    {
        return view('UserPanel.user-register');
    }
    
    public function storePanelRegister(Request $request)
    {
        // $rules = [
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'username' => 'required|unique:users',
        //     'password' => 'required|min:8',
        //     'terms' => 'accepted',
        // ];

        // $messages = [
        //     'terms.accepted' => 'You must agree to the terms and conditions.',
        // ];

        // $request->validate($rules, $messages);

        // dd($request);
        // Create a new user
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->age = $request->input('age');
        $user->region = $request->input('region');
        $user->city = $request->input('city');
        $user->country = $request->input('country');
        $user->user_type = 'user';
        $user->password = Hash::make($request->input('password'));
        $user->gender = $request->input('gender') ;
        $user->food = $request->has('food') == '1';
        $user->lover = $request->has('lover') == '1';
        $user->swimming = $request->has('swimming') == '1';
        $user->travel = $request->has('travel') == '1';
        $user->hotels = $request->has('hotels') == '1';
        $user->save();

        return redirect()->route('userPanelLogin');
    }

    public function submitLogin(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            if (isset($request->email) && isset($request->password)) {
                // $remember_me = $request->has('remember_me') ? true : false;
                $user = User::where('email', $request->email)->first();
                if (isset($user) && !empty($user)) {
                    $password = $user->password;
                    if (Hash::check($request->password, $user->password)) {
                        if (Auth::guard('User')->attempt(['email' => $request->email, 'password' => $request->password])) {
                            Session::flash('success', 'Login success');
                            return redirect()->route('webpage');
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

    public function logoutUserPanel()
    {
        Auth::guard('User')->logout();
        Session::flash('success', 'Logout');
        return redirect()->route('userPanelLogin');
    }

    public function updateUserdetail(Request $request)
    {
        $userId = Auth::guard('User')->user()->id;
        $userDetail = User::find($userId);
        // dd($user);
        if($request->isMethod('post')){
            $userDetail->name = $request->input('name');
            $userDetail->email = $request->input('email');
            $userDetail->phone = $request->input('phone');
            $userDetail->age = $request->input('age');
            $userDetail->region = $request->input('region');
            $userDetail->city = $request->input('city');
            $userDetail->country = $request->input('country');
            $userDetail->user_type = 'user';
            $userDetail->gender = $request->input('gender') ;
            $userDetail->food = $request->has('food') == '1';
            $userDetail->lover = $request->has('lover') == '1';
            $userDetail->swimming = $request->has('swimming') == '1';
            $userDetail->travel = $request->has('travel') == '1';
            $userDetail->hotels = $request->has('hotels') == '1';
            $userDetail->save();

            Session::flash('success', 'User Details updated Successfully');
            return redirect()->route('updateUserdetail');  
        
        }

        return view('UserPanel.edit-user-detail',compact('userDetail'));
    }

    public function changePass(Request $request)
    {
        $user = Auth::guard('User')->user();
        $oldPassword = $request->input('old_password');
        $newPassword = $request->input('new_password');

        if (Hash::check($oldPassword, $user->password)) {
            $user->password = Hash::make($newPassword);
            $user->save();

            return redirect()->route('updateUserdetail')->with('success', 'Password changed successfully.');
        } else {
            return redirect()->route('updateUserdetail')->with('error', 'Old password does not match.');
        }
    }

}
