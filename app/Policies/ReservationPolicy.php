<?php

namespace App\Policies;

use App\Reservation;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;


class ReservationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any reservations.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if( $user->role == 2){ //if admin
        return true;
        }
        else{
        return false;
        }
    }

    /**
     * Determine whether the user can view the reservation.
     *
     * @param  \App\User  $user
     * @param  \App\Reservation  $reservation
     * @return mixed
     */
    public function view(User $user, Reservation $reservation)
    {
        if( $user->role == 2){ //if admin
            return true;}
        else if($reservation->user_id == $user->id ){ //if user made the reservation
            return true;}
        else if( $user->role == 3 && $user->apartmentsOwned->contains( $reservation->apartment_id )){ //if user is the owner of the reserved apartment
            return true;
        }
        else{
        return false;
        }
    }

    /**
     * Determine whether the user can create reservations.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if( $user->role == 1 || $user->role == 2) //if normal user or admin
        return true;
        else return false;
    }

    /**
     * Determine whether the user can update the reservation.
     *
     * @param  \App\User  $user
     * @param  \App\Reservation  $reservation
     * @return mixed
     */
    public function update(User $user, Reservation $reservation)
    {
        if( $user->role == 2){ //if admin
        return true;
        }else if($reservation->user_id == $user->id ){ //if user is the author
        return true;
        }else{
        return false;
        }
    }

    /**
     * Determine whether the user can delete the reservation.
     *
     * @param  \App\User  $user
     * @param  \App\Reservation  $reservation
     * @return mixed
     */
    public function delete(User $user, Reservation $reservation)
    {
        if( $user->role == 2){ //if admin
        return true;
        }else if($reservation->user_id == $user->id ){ //if user is the author
        return true;
        }else{
        return false;
        }
    }

}
