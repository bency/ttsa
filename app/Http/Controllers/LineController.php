<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Redirect;

class LineController extends Controller
{
    public function index(Request $request)
    {
        return view('line.list');
    }

    public function show($id)
    {
        return view('line.edit', ['redirect' => null]);
    }

    public function create()
    {
        return view('line.edit', ['redirect' => null]);
    }

    public function edit($id)
    {
        $redirect = Redirect::find($id);
        return view('line.edit', ['redirect' => $redirect]);
    }

    public function store(Request $request)
    {
        $path = $request->input('path');
        $url = $request->input('url');
        $redirect = Redirect::create(['path' => $path, 'url' => $url]);
        return redirect()->route('line.index');
    }

    public function update(Request $request, $id)
    {
        $redirect = Redirect::find($id);
        if (!$redirect) {
            return redirect()->route('home');
        }
        $redirect->update(['url' => $request->input('url')]);
        $redirect->update(['path' => $request->input('path')]);
        return redirect()->route('line.index');
    }
}
