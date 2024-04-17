<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Models\Review;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Review::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReviewRequest $request)
    {
        // return $request;
        // $review = Review::created($request->all());
        // $review->save();

        
        if($request["rating"] > 5 || $request["rating"] < 1) {
            return response('Rating should be between 1-5!', 400);
        }

        $field = $request->validate([
            'book_id' => 'required',
            'content' => 'required|string',
            'rating' => 'required'
        ]);
        $field["user_id"] = auth()->user()->id;

        $alreadyRated = Review::where('book_id', $request["book_id"])->where('user_id', $field["user_id"])->first();
        

        if(isset($alreadyRated)) {
            $update = new UpdateReviewRequest;
            $update["user_id"] = $field["user_id"];
            $update["book_id"] = $field["book_id"];
            $update["content"] = $field["content"];
            $update["rating"] = $field["rating"];

            return $this->update($update,  $alreadyRated['id']);
        }

        $review = new Review;
 
        $review = Review::create($field);
        
        return $review;

        // $flight->save();

        // return response($review);
    }

    /**
     * Display the specified resource.
     */
    // public function show(Review $review)
    // {
    //     return Review::find
    // }
    public function show($id) {
        $found = Review::where('id', $id)->first();

        if(!isset($found)) {
            return response([
                'message' => 'Resource not found!'
            ], 404);
        }

        return Review::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewRequest $request, $id)
    {
        // return response('updated');
        // return $review;
        // return $id;
        // $found = Review::find(1)->first();
        $found = Review::where('id', $id)->first();
        // return $found;
        // return $found;
        // return $found;

        // return auth()->user()->id." = ".$found["author_id"]." = ".$found["id"];

        if(!isset($found)) {
            return response([
                'message' => 'Resource not found!'
            ], 404);
        }

        // return auth()->user()->id." = ".$found;
        if(
            auth()->user()->id != $found["user_id"]
        ) {
            return response([
                "message" => "Fobidden resource"
            ], 403);
            return $found;
        }

        $found->fill($request->all())->save();
        return $found;
        // return [];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $found = Review::where('id', $id)->first();
        if(!isset($found)) {
            return response([
                'message' => 'Resource not found!'
            ], 404);
        }

        if(
            (auth()->user()->id != $found["author_id"] && auth()->user()->role == "user")
            || 
           (auth()->user()->role != "admin" && auth()->user()->id != $found["author_id"])
        ) {
            return response([
                "message" => "Fobidden resource"
            ], 403);
            return $found;
        }

        Review::destroy($id);

        return response("Review ".$id."is deleted!");
    }

    public function fromBook($id) {
        return Review::where('book_id', $id)->get();
    }

    public function fromUser() {
        // return 1;
        return Review::where('user_id', auth()->user()["id"])->get();
        // return auth()->user()->id;
    }
}
