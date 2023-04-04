<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
{
    $locations = Location::all();
    return view('map', compact('locations'));
}
}