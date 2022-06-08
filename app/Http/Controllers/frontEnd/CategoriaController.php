<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index($id)
    {
        return view('page.frontend.categoria')->with('id',$id);
    }
}
