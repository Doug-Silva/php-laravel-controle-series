<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index()
    {
        /*
        | query ordenada por nomes
        | exemplo:
        | $series = Serie::query()->orderBy('nome')->get();
        */
        $series = Serie::all();

        /*
        | pode utilizar a função compact('series'));
        | exemplo:
        | return view('listar-series', compact('series'));
        */
        return view('series.index')->with('series', $series);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        //Serie::create($request->only(['nome']));
        Serie::create($request->all());

        return to_route('series.index');
    }

    public function destroy(Request $request)
    {
        Serie::destroy($request->series);

        return to_route('series.index');
    }
}
