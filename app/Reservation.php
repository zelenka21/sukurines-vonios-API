<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
	protected $fillable = [
		'user_id',
		'apartment_id',
		'guestCount',
		'arrival',
		'departure'
	];


    public function user()
    {
      return $this->belongsTo(User::class);
    }
    public function apartment()
    {
      return $this->belongsTo(Apartment::class);
    }
}
