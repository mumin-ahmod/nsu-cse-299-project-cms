<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRoleController extends Controller
{


    public function index()
    {
        // Retrieve all users and their roles from the user_roles table
        $users = User::with(['roles' => function ($query) {
            $query->where('role', 'admin');
        }])->get();
    
        // Get the currently logged-in user
        $loggedInUser = Auth::user();
    
        // Filter out the logged-in user's data
        $users = $users->reject(function ($user) use ($loggedInUser) {
            return $user->id === $loggedInUser->id;
        });
    
        return view('backend.user-roles.index', compact('users'));
    }

    public function makeAdmin(User $user)
    {
        UserRole::updateOrCreate(
            ['user_id' => $user->id],
            ['role' => 'admin']
        );

        return redirect()->route('user-roles.index')->with('message', 'User is now an admin.');
    }

    public function removeAdmin(User $user)
    {
        UserRole::updateOrCreate(
            ['user_id' => $user->id],
            ['role' => 'user']
        );

        return redirect()->route('user-roles.index')->with('message', 'Admin privileges removed.');
    }

}
