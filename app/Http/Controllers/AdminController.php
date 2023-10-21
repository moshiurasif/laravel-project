<?php

namespace App\Http\Controllers;

use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        Toastr::success('User Logout Successfully', 'success', ["options"]);
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
}
