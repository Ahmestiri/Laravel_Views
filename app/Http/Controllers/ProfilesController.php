<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    //-------- Profile Index --------//
    public function index(\App\Models\User $user)
    {
        return view('profiles/index', compact('user'));
    }
    //-------- Profile Edit --------//
    public function edit(\App\Models\User $user)
    {
        return view('profiles/edit', compact('user'));
    }
    //-------- Profile Update --------//
    public function update(\App\Models\User $user)
    {
        #Form Request & Validation for User
        $dataUser = request()->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'class' => 'required',
            'pole' => 'required',
            'bureau' => '',
        ]);
        #Checkbox and Radio buttons not checked
        if (!isset($_POST['class']))
            $dataUser['class'] = '';
        if (!isset($_POST['pole']))
            $dataUser['pole'] = '';
        if (!isset($_POST['bureau']))
            $dataUser['bureau'] = '';
        #Update User
        auth()->user()->update($dataUser);
        #Form Request & Validation for Profile
        $dataProfile = request()->validate([
            'url' => 'url',
            'image' => '',
        ]);
        #Upload Image for Profile
        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(500, 500);
            $image->save();
            $imageArray = ['image' => $imagePath];
        }
        #Update Profile
        auth()->user()->profile->update(array_merge($dataProfile, $imageArray ?? []));
        #Redirect to index
        return redirect('/profile/' . auth()->user()->id);
    }
    //-------- Profile Delete --------//
    public function destroy(\App\Models\User $user)
    {
        #Delete Profile 
        if ($user->id == auth()->user()->id) {
            $user->delete();
        } else {
            abort(403);
        }
        #Redirect to index
        return redirect('/');
    }
}
