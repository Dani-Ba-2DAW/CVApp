<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    function view($id)
    {
        $alumno = Alumno::find($id);
        if (
            $alumno == null ||
            $alumno->fotografia == null ||
            !file_exists(storage_path('app/private') . '/' . $alumno->fotografia)
        ) {
            return response()->file(base_path('public/assets/img/user.jpg'));
        };
        return response()->file(storage_path('app/private') . '/' . $alumno->fotografia);
    }
}
