<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //--------Users Index --------//
    public function index()
    {
        $projet = 0;
        $rh = 0;
        $marketing = 0;
        $devco = 0;
        #Select All Users
        $users = User::All();
        #Calculate Number of users in each Pole 
        foreach ($users as $user) {
            if ($user->pole == 'Projet') {
                $projet = $projet + 1;
            }
        }
        foreach ($users as $user) {
            if ($user->pole == 'RH') {
                $rh = $rh + 1;
            }
        }
        foreach ($users as $user) {
            if ($user->pole == 'Marketing') {
                $marketing = $marketing + 1;
            }
        }
        foreach ($users as $user) {
            if ($user->pole == 'DevCo') {
                $devco = $devco + 1;
            }
        }
        #Users Index Link
        return view('/welcome', compact('users', 'projet', 'rh', 'marketing', 'devco'));
    }
}
