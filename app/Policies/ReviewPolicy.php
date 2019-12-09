<?php

namespace App\Policies;

use App\Review;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReviewPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any reviews.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //

        return true;
    }
     
    public function view(User $user, Review $review)
    {
       return true;
    }

    /**
     * Determine whether the user can create reviews.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if( $user->role == 1) //if normal user
        return true;
        else return false;
    }

    /**
     * Determine whether the user can update the review.
     *
     * @param  \App\User  $user
     * @param  \App\Review  $review
     * @return mixed
     */
    public function update(User $user, Review $review)
    {
        if( $user->role == 2){ //if admin
        return true;
        }else if($review->user_id == $user->id ){ //if user is the author
        return true;
        }else{
        return false;
        }
    }

    /**
     * Determine whether the user can delete the review.
     *
     * @param  \App\User  $user
     * @param  \App\Review  $review
     * @return mixed
     */
    public function delete(User $user, Review $review)
    {
        if( $user->role == 2){ //if admin
        return true;
        }else if($review->user_id == $user->id ){ //if user is the author
        return true;
        }else{
        return false;
        }
    }

}
