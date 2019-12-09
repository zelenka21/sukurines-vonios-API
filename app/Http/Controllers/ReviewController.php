<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\User;
use Auth;
use App\Apartment;
use App\Http\Resources\ReviewResource;


class ReviewController extends Controller
{

     public function __construct(){

      //  $this->authorizeResource(Review::class, 'review')->except(['index', 'show']);

$this->authorizeResource(Review::class, null, [
        'except' => ['index', 'show'],]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Apartment $apartment)
    {

           return ReviewResource::collection(Review::where('apartment_id', $apartment->id)->get());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
            $review = Review::create([
                'user_id' => Auth::user()->id, //recent
                'apartment_id' => $request->apartment_id,
                'title' => $request->title,
                'reviewText' => $request->reviewText,
                'rating' => $request->rating,
            ]);


        return response(new ReviewResource($review), 201);
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment, $id)
    {
  
        $review = Review::find($id);

        if (!$review) {
            return response("not found", 404);
        }
        else if($review->apartment_id == $apartment->id)
        {
            return new ReviewResource($review);

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
    public function update(Request $request, Apartment $apartment, Review $review)
    {
        //
        $review->update($request->only(['title','reviewText', 'rating']));
        
        return response(new ReviewResource($review), 200);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment,Review $review)
    {
        //Request $request, 
        $review->delete();
        return response('', 204);
    }

}
