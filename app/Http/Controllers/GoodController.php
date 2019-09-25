<?php

namespace App\Http\Controllers;

use App\Good;
/*use Illuminate\Http\Request;*/

use App\Http\Requests\GoodRequest;

class GoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Good[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Good::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*    public function create()
        {
            //
        }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoodRequest $request)
    {
        $day = Good::create($request->validated());
        return $day;
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Good $good
     * @return \Illuminate\Http\Response
     */
    public function show(Good $game)
    {
        return $game = Good::findOrFail($game);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Good $good
     * @return \Illuminate\Http\Response
     */
    /*public function edit(Good $good)
    {
        //
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Good $good
     * @return \Illuminate\Http\Response
     */
    public function update(GoodRequest $request, $id)
    {
        $game = Good::findOrFail($id);
        $game->fill($request->except(['game_id']));
        $game->save();
        return response()->json($game);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Good $good
     * @return \Illuminate\Http\Response
     */
    public function destroy(GoodRequest $request, $id)
    {
        $game = Good::findOrFail($id);
        if ($game->delete()) return response(null, 204);
    }
}
