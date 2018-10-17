<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index()
    {
        $links = \App\Link::all();
        return view('link/index', compact('links'));
    }

    public function go(\App\Link $link)
    {
        $link->increment('count');
        header('Location:' . $link->url);
        die;
    }
}
