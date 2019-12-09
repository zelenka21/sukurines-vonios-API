<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    //
	protected $fillable = [
		'title',
		'description',
		'location',
		'image'
	];

    public function reviews(){
    	return $this->hasMany(Review::class);
    }
    public function reservations(){
    	return $this->hasMany(Reservation::class);
    }

public function ownedBy(){
    return $this->belongsToMany( 'App\Models\User', 'apartments_owners', 'apartment_id', 'user_id' );
    }

}
