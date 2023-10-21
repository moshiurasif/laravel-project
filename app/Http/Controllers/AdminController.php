<?php

namespace App\Http\Controllers;

use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        Toastr::success('Admin Logout Successfully', 'success', ["options"]);
        return redirect('/login');
    }

    public function Profile()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view', compact('adminData'));
    }

    public function ProfileEdit()
    {
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('admin.admin_profile_edit', compact('editData'));
    }
    public function ProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;

        if ($request->file('propic')) {
            $file = $request->file('propic');

            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $fileName);
            $data['propic'] = $fileName;
        }

        $data->save();
        Toastr::success('Profile Updated Successfully', 'success', ["options"]);

        return redirect()->route('admin.profile');
    }

    public function ChangePassword()
    {
        return view("admin.admin_change_password");
    }
    public function UpdatePassword(Request $request)
    {
        $validateData = $request->validate([
            'oldPassword' => "required",
            'newPassword' => "required",
            'confirmPassword' => "required|same:newPassword",
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldPassword, $hashedPassword)) {
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newPassword);
            $users->save();
            Toastr::success('Password Updated Successfully', 'success', ["options"]);
            return redirect()->back();
        } else {
            Toastr::error('Old Password is not match', 'Error', ["options"]);
            return redirect()->back();
        }
    }
}
