<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\User;
use Auth;
use App\Http\Resources\ReservationResource;


class ReservationController extends Controller
{
    public function __construct(){

    
        $this->authorizeResource(Reservation::class, null, [
        'except' => ['index', 'show'],]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user, Reservation $reservation)
    {
        return ReservationResource::collection(Reservation::where('user_id', $user->id)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        //
        $reservation = Reservation::create([
            //'user_id' => $user->id, //update to auth
            'user_id' => Auth::user()->id, //recent
            'apartment_id' => $request->apartment_id,
            'guestCount' => $request->guestCount,
            'arrival' => $request->arrival,
            'departure' => $request->departure,
        ]);
        return response(new ReservationResource($reservation), 201);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, $id)
    {
        
         $reservation = Reservation::find($id);

        if (!$reservation) {
            return response("not found", 404);
        }
        else if($reservation->user_id == $user->id)
        {
            return new ReservationResource($reservation);

        }
        else 
        {
            return response()->json("not found", 404);
        }



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, Reservation $reservation)
    {
        $reservation->update($request->only(['guestCount', 'arrival', 'departure']));

        
        return response(new ReservationResource($reservation), 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
        $reservation->delete();
        return response('', 204);
    }
}
