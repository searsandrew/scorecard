<?php

namespace App\Http\Controllers;

use App\Boardgame;
use Illuminate\Http\Request;

class BoardgameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index() : \Illuminate\View\View
    {
        $boardgames = Boardgame::all();
        return view('matterhorn.boardgame.index', compact('boardgames'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() : \Illuminate\View\View
    {
        return view('matterhorn.boardgame.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'ref_id' => 'required|integer',
            'scorecard' => 'required|json'
        ],
        [
            'ref_id.integer' => 'Item ID\'s are numbers only',
            'scorecard.json' => 'JSON did not validate'
        ]);

        $stored = auth()->user()->boardgames()->create($validated);
        
        return redirect(route('boardgame.show', $stored->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Boardgame  $boardgame
     * @return \Illuminate\View\View
     */
    public function show(Boardgame $boardgame) : \Illuminate\View\View
    {
        $bgg = $boardgame->geekdoAPI();
        return view('matterhorn.boardgame.show', compact('boardgame', 'bgg'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Boardgame  $boardgame
     * @return \Illuminate\View\View
     */
    public function edit(Boardgame $boardgame) : \Illuminate\View\View
    {
        return view('matterhorn.boardgame.edit', compact('boardgame'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Boardgame  $boardgame
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Boardgame $boardgame)
    {
        $validated = $request->validate([
            'name' => 'required',
            'ref_id' => 'required|integer',
            'scorecard' => 'required|json'
        ],
        [
            'ref_id.integer' => 'Item ID\'s are numbers only',
            'scorecard.json' => 'JSON did not validate'
        ]);

        $boardgame->update($validated);

        return redirect(route('boardgame.show', $boardgame->id))->with('status', $boardgame->name . ' has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Boardgame  $boardgame
     * @return \Illuminate\Http\Response
     */
    public function destroy(Boardgame $boardgame)
    {
        $boardgame->delete();

        return redirect(route('boardgame.index'))->with('status', 'Boardgame has been deleted.');
    }
}
