<?php

namespace App\Policies;

use App\Models\User;

class AdminPolicy
{
    /**
     * Create a new policy instance.
     */
   

    public function viewAdminPanel(User $user)
    {
        // Check if the user is an admin using the isAdmin method
        return $user->isAdmin();
    }

}
