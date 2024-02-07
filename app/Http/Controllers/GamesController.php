<?php

namespace App\Http\Controllers;

use App\Models\Games;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Games::query()->get();
        return Response()->view('game.index', ['games' => $games]);
    }

    public function indexAdd(Request $request)
    {
        return Response()->view('game.add');
    }

    public function showGames($id)
    {
        $game = Games::query()->where('id', $id)->get();
        return Response()->view('game.detail', ['game' => $game, 'pageTitle' => $game[0]['judul']]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Display the specified resource.
     */
    public function create(Request $request, Games $games)
    {
        $imageName = '';
        if (!empty($request->file('image'))) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storePubliclyAs('img', $imageName, 'public');
        }

        Games::create([
            'judul' => $request->input('judul'),
            'genre' => json_encode(['genre' => $request->input('genre')]),
            'deskripsi' => $request->input('deskripsi'),
            'image' => $imageName,
            'link' => $request->input('link'),
        ]);

        return redirect('/game');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Games $game, $id)
    {
        $game = Games::where('id', $id)->get();
        return Response()->view('game.edit', ['game' => $game[0]]);
    }

    public function editGames(Request $request, Games $game, $id)
    {
        $imageName = '';
        if (!empty($request->file('image'))) {
            $image = $request->file('image');
            // var_dump($image->getClientOriginalName());
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storePubliclyAs('img', $imageName, 'public');
        } else {
            $imageName = $request->input('gambar');
        }

        Games::where('id', $id)->update([
            'judul' => $request->input('judul'),
            'genre' => json_encode(['genre' => $request->input('genre')]),
            'deskripsi' => $request->input('deskripsi'),
            'image' => $imageName,
            'link' => $request->input('link'),
        ]);
        return redirect('/game');
    }

    /**
     * Update the specified resource in storage.
     */
    public function hapusGame(Request $request, Games $games, $id)
    {
        $games = Games::where('id', '=', $id);
        $games->delete();
        return redirect('/game');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Games $games)
    {
        //
    }
}
