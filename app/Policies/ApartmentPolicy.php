<?php

namespace App\Policies;

use App\Apartment;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ApartmentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any apartments.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        // if( $user->role == 2){ //if admin
        // return true;
        // }
        // else{
        // return false;
        // }
        return true;
    }

    /**
     * Determine whether the user can view the apartment.
     *
     * @param  \App\User  $user
     * @param  \App\Apartment  $apartment
     * @return mixed
     */
    public function view(User $user, Apartment $apartment)
    {
        // if( $user->role == 2){ //if admin
        // return true;
        // }else if($user->apartmentsOwned->contains( $apartment->id ) ){
        // return true;
        // }else{
        // return false;
        // }
        return true;
    }

    /**
     * Determine whether the user can create apartments.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //if( $user->permission == 2 || $user->permission == 3 ){
        
        if( $user->role == 2){ //if admin
        return true;
        }else if( $apartment != null && $user->apartmentsOwned->contains( $apartment->id ) ){
        return true;
        }else{
        return false;
        }

    }

    /**
     * Determine whether the user can update the apartment.
     *
     * @param  \App\User  $user
     * @param  \App\Apartment  $apartment
     * @return mixed
     */
    public function update(User $user, Apartment $apartment)
    {
        if( $user->role == 2){ //if admin
        return true;
        }else if($user->apartmentsOwned->contains( $apartment->id ) ){
        return true;
        }else{
        return false;
        }

    }


    /**
     * Determine whether the user can delete the apartment.
     *
     * @param  \App\User  $user
     * @param  \App\Apartment  $apartment
     * @return mixed
     */
    public function delete(User $user, Apartment $apartment)
    {
        if( $user->role == 2){ //if admin
        return true;
        }else if($user->apartmentsOwned->contains( $apartment->id ) ){
        return true;
        }else{
        return false;
        }
    }

}
