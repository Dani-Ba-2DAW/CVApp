<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class MainController extends Controller
{
    function __invoke()
    {
        return view('main.index', ['alumnos' => Alumno::all()]);
    }
}
