<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ComicsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::all();
        return view('admin.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newComic = new Comic();
        $newComic->title = $data['title'];
        $newComic->price = $data['price'];
        $newComic->series = $data['series'];

        if ($request->has('thumb')) {
            $file_path = Storage::put('comics_thumbs', $request->thumb);
            $newComic->thumb = $file_path;
        }

        $newComic->save();

        return to_route('admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comic $comics)
    {
        return view('admin.show_details', compact('comics'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comic $comic)
    {
        return view('admin.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comic $comics)
    {
        $data = $request->all();


        if ($request->has('thumb') && $comics->thumb) {


            Storage::delete($comics->thumb);


            $newCover = $request->thumb;
            $path = Storage::put('comics_thumbs', $newCover);
            $data['thumb'] = $path;
        }


        $comics->update($data);
        return to_route('comics.show', $comics);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comics)
    {
        // CONTROLLA SE L'ISTANZA HA UN FILE DI ANTEPRIMA. SE SI LO ELIMINA DAL filesystem
        if (!is_null($comics->thumb)) {
            Storage::delete($comics->thumb);
        }
        //dd($comics);
        // ELIMINA IL RECORD DAL DATABASE
        $comics->delete();

        // RIDIRIGE AD UNA ROTTA DESIDERATA CON UN MESSAGGIO
        return to_route('comics.index')->with('message', 'Comic Deleted Succesfuly');
    }
}
