<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use App\Http\Requests\StoreComicRequest;
use App\Http\Requests\UpdateComicRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\isNull;

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
    public function store(StoreComicRequest $request)
    {

        $valData = $request->validated();

        if ($request->has('thumb')) {
            $file_path = Storage::put('comics_thumbs', $request->thumb);
            $valData['thumb'] = $file_path;
        }

        $newComic = Comic::create($valData);

        return to_route('comics.index')->with('message', 'New entry Added');
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
    public function update(UpdateComicRequest $request, Comic $comic)
    {
        $valData = $request->validated();

        if ($request->has('thumb')) {

            $newCover = $request->thumb;
            $path = Storage::put('comics_thumbs', $newCover);

            if (!isNull($comic->thumb) && Storage::fileExists($comic->thumb)) {
                Storage::delete($comic->thumb);
            }

            $valData['thumb'] = $path;
        }

        $comic->update($valData);
        return to_route('comics.show', $comic)->with('message', 'Comic Edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comics)
    {
        if (!is_null($comics->thumb)) {
            Storage::delete($comics->thumb);
        }

        $comics->delete();

        return to_route('comics.index')->with('message', 'Comic Deleted');
    }
}
