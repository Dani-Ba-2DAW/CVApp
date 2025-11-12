<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $alumnos = Alumno::all(); // SELECT * FROM alumno;
        $array = ['alumnos' => $alumnos];
        return view('alumno.index', $array);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('alumno.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $result = false;
        $message = ['general' => 'El alumno ha sido añadido correctamente.'];
        $alumno = new Alumno($request->all()); // Guardamos los datos en la clase
        try {
            $request->validate([
                'nombre' => 'required|string|min:2|max:50',
                'apellidos' => 'required|string|min:2|max:80',
                'telefono' => 'nullable|string|max:20',
                'correo' => 'required|email|min:6|max:100|unique:alumnos,correo',
                'fecha_nacimiento' => 'nullable|date',
                'nota_media' => 'nullable|numeric|max:10',
                'experiencia' => 'nullable|string|max:1000',
                'formacion' => 'nullable|string|max:255',
                'habilidades' => 'nullable|string|max:500',
                'fotografia' => 'nullable|image|max:2048'
            ]);
            $result = $alumno->save();
            $fotografia = $this->upload($request, $alumno->id);
            if ($fotografia != null) {
                $alumno->fotografia = $fotografia;
            }
            $result = $alumno->save(); // Guardamos los datos en la base de datos
        } catch (\Exception $e) {
            $message['general'] = 'Ha ocurrido un error inesperado, consulte con el administrador si el problema persiste.';
        }
        // Redirección
        if (!$result) return back()->withInput()->withErrors($message); // Si ha fallado, vuelve al formulario con los campos y devolviendo un error
        return redirect()->route('alumno.index')->with($message); // Si no, va a /alumno
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno): View
    {
        return view('alumno.show', ['alumno' => $alumno]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        return view('alumno.edit', ['alumno' => $alumno]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumno $alumno): RedirectResponse
    {
        $result = false;
        $message = ['general' => 'El alumno ha sido modificado correctamente.'];
        try {
            $request->validate([
                'nombre' => 'required|string|min:2|max:50',
                'apellidos' => 'required|string|min:2|max:80',
                'telefono' => 'nullable|string|max:20',
                'correo' => 'required|email|min:6|max:100|unique:alumnos,correo,' . $alumno->id,
                'fecha_nacimiento' => 'nullable|date',
                'nota_media' => 'nullable|numeric|max:10',
                'experiencia' => 'nullable|string|max:1000',
                'formacion' => 'nullable|string|max:255',
                'habilidades' => 'nullable|string|max:500',
                'fotografia' => 'nullable|image|max:2048'
            ]);
            if ($request->deleteimage == 'delete') {
                $this->destroyImage(storage_path('app/private') . '/' . $alumno->fotografia);
            }
            $result = $alumno->update($request->all());
            $fotografia = $this->upload($request, $alumno->id);
            if ($fotografia != null) {
                $alumno->fotografia = $fotografia;
            }
            $result = $alumno->update($request->all()); // Update
        } catch (\Exception $e) {
            $message['general'] = 'Ha ocurrido un error inesperado, consulte con el administrador si el problema persiste.';
        }
        if (!$result) return back()->withInput()->withErrors($message); // Si ha fallado, vuelve al formulario con los campos y devolviendo un error
        return redirect()->route('alumno.index')->with($message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno): RedirectResponse
    {
        $result = false;
        $message = ['general' => 'El alumno ha sido eliminado correctamente.'];
        try {
            $result = $alumno->delete();
        } catch (\Exception $e) {
            $message['general'] = 'Ha ocurrido un error inesperado, consulte con el administrador si el problema persiste.';
        }
        if (!$result) return back()->withErrors($message); // Si ha fallado, vuelve al formulario con los campos y devolviendo un error
        return redirect()->route('alumno.index')->with($message);
    }

    private function upload(Request $request, $id)
    {
        $path = null;
        if ($request->hasFile('imagen') && $request->file('imagen')->isValid()) {
            $image = $request->file('imagen');
            $fileName = $id . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('images', $fileName, 'local'); // Privado
        }
        return $path;
        //dd([$path, storage_path('app/private') . '/' . $path]);
    }

    private function destroyImage($file)
    {
        Storage::delete($file);
    }
}
