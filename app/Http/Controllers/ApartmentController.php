<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use App\Review;
use App\Http\Resources\ApartmentResource;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return ApartmentResource::collection(Apartment::all());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $apartment = Apartment::create(
        [
        'title' => $request->title,
        'description' => $request->description,
        'location' => $request->location,
        'image' => $request->image,
        ]);

        //return new ApartmentResource($apartment);

        return response(new ApartmentResource($apartment), 201);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        return new ApartmentResource($apartment);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
    {
        //todo
        //check if user is admin

        $apartment->update($request->only(['title', 'description', 'location', 'image']));


         return response(new ApartmentResource($apartment), 200);
     // return new ApartmentResource($apartment );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        //
        $apartment->delete();

        return response('', 204);
    }
     
}
