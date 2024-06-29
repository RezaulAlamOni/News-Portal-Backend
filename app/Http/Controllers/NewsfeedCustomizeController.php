<?php

namespace App\Http\Controllers;

use App\Models\NewsfeedCustomize;
use App\Models\User;
use Illuminate\Http\Request;

class NewsfeedCustomizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(NewsfeedCustomize::query()->where('user_id',auth()->id())->first());
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
     * @throws \JsonException
     */
    public function store(Request $request)
    {
        NewsfeedCustomize::query()->updateOrCreate(['user_id' => auth()->id()],
            [
                'category' => $request->category,
                'author' => $request->author,
                'source' => json_encode($request->sources, JSON_THROW_ON_ERROR)
            ]);

        return response()->json(['user' =>User::with('customNewsfeed')->find(auth()->id()),'message' => 'Newsfeed customized successfully'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(NewsfeedCustomize $newsfeedCustomize)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NewsfeedCustomize $newsfeedCustomize)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NewsfeedCustomize $newsfeedCustomize)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsfeedCustomize $newsfeedCustomize)
    {
        //
    }
}
