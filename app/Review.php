<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
   	protected $fillable = [
		'user_id',
		'apartment_id',
		'title',
		'reviewText',
		'rating'
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
