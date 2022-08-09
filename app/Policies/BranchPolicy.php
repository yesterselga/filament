<?php

namespace App\Policies;

use App\Models\Branch;
use App\Models\User;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Auth\Access\HandlesAuthorization;

class BranchPolicy
{
     use HandlesAuthorization;

     /**
      * Determine whether the user can view any models.
      *
      * @param  \App\Models\User  $user
      * @return \Illuminate\Auth\Access\Response|bool
      */
     public function viewAny(User $user)
     {
          return $user->can('branch.view');
     }

     /**
      * Determine whether the user can view the model.
      *
      * @param  \App\Models\User  $user
      * @param  \App\Models\Branch  $branch
      * @return \Illuminate\Auth\Access\Response|bool
      */
     public function view(User $user, Branch $branch)
     {
          return $user->can('branch.view');
     }

     /**
      * Determine whether the user can create models.
      *
      * @param  \App\Models\User  $user
      * @return \Illuminate\Auth\Access\Response|bool
      */
     public function create(User $user)
     {
          return $user->can('branch.create');
     }

     /**
      * Determine whether the user can update the model.
      *
      * @param  \App\Models\User  $user
      * @param  \App\Models\Branch  $branch
      * @return \Illuminate\Auth\Access\Response|bool
      */
     public function update(User $user, Branch $branch)
     {
          return $user->can('branch.edit');
     }

     /**
      * Determine whether the user can delete the model.
      *
      * @param  \App\Models\User  $user
      * @param  \App\Models\Branch  $branch
      * @return \Illuminate\Auth\Access\Response|bool
      */
     public function delete(User $user, Branch $branch)
     {
          return $user->can('branch.delete');
     }

     /**
      * Determine whether the user can restore the model.
      *
      * @param  \App\Models\User  $user
      * @param  \App\Models\Branch  $branch
      * @return \Illuminate\Auth\Access\Response|bool
      */
     public function restore(User $user, Branch $branch)
     {
          //
     }

     /**
      * Determine whether the user can permanently delete the model.
      *
      * @param  \App\Models\User  $user
      * @param  \App\Models\Branch  $branch
      * @return \Illuminate\Auth\Access\Response|bool
      */
     public function forceDelete(User $user, Branch $branch)
     {
          //
     }
}
