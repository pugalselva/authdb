<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class EmployeeProfileController extends Controller
{
    public function show()
    {
        $user =Auth::user();
        return view('employee.profile.show', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('employee.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user =Auth::user();
        $user->update($request->all());
        return redirect()->route('profile.show')->with('success', 'profile update successfully');
    }

    public function destroy()
    {
         $user = Auth::user();
         $user->delete();
         Auth::logout();
         return redirect('/')->with('success', 'Profile delete successfully');
    }
}
