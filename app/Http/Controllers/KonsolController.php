<?php

namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\Konsol;
use App\Models\Rental;
use Illuminate\Http\Request;

class KonsolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showKonsols()
    {
        $konsol = Konsol::query()->get();
        return Response()->view('konsol.index', ['konsol' => $konsol]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $lastId = Konsol::max('id');
        Konsol::create([
            'id' => $lastId+1,
        ]);
        return redirect('/konsol');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function delete(Request $request, $id)
    {
        $foreignExists = Rental::where('id_konsol', $id)->get();

        if (!empty($foreignExists[0])) {
            return back()->withErrors(['error' => 'Konsol masih dipakai']);   
        }

        $rental = Konsol::where('id', '=', $id);
        $rental->delete();
        return redirect('/konsol');
    }

    /**
     * Display the specified resource.
     */
    public function show(Konsol $konsol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Konsol $konsol, $id)
    {
        $konsol = Konsol::where('id', $id)->get();
        $games = Games::select(['id', 'judul'])->get();
        return Response()->view('konsol.edit', ['konsol' => $konsol[0], 'games' => $games]);
    }

    public function editKonsol(Request $request, Konsol $konsol, $id)
    {
        $id_game = '';
        if(!empty($request->input('games', []))) {
            foreach($request->input('games', []) as $game) {
                $id_game .= $game . ',';
            }
            $id_game = substr_replace($id_game, "", -1);
        }

        Konsol::where('id', $id)->update([
            'id_game' => $id_game,
            'status' => $request->input('status'),
        ]);
        return redirect('/konsol');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Konsol $konsol)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Konsol $konsol)
    {
        //
    }
}
