<?php

namespace App\Http\Controllers;

use App\Song;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index(){
        $songs = Song::all();
        return view('welcome',compact('songs'));
    }
}
