<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Http\Requests\StoreRatingRequest;
use App\Http\Requests\UpdateRatingRequest;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ratings = Rating::all();
        return view('ratings.index', compact(['ratings']));
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
    public function store(StoreRatingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * show(Rating $rating) <--- Route-Model binding
     * retrieve the $rating from the Rating Model and return its
     * contents or fail (404)
     */
    public function show(Rating $rating)
    {
        return view('ratings.show', compact(['rating']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rating $rating)
    {
        return view('ratings.edit', compact(['rating']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRatingRequest $request, Rating $rating)
    {
        $id = $rating->id;
        $newName = $request->name;
        $newIcon = $request->icon;
        $newStars = $request->stars;
        $rating->update([
            'name' => $newName,
            'stars' => $newStars,
            'icon' => $newIcon,
        ]);

        return redirect(route('ratings.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rating $rating)
    {
        //
    }
}
