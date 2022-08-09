<?php

namespace App\Policies;

use App\Models\User;
use Chiiya\FilamentAccessControl\Models\FilamentUser;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomerPolicy
{
     use HandlesAuthorization;

     public function viewAny(User $user)
     {
          return $user->can('customer.view');
     }
}
