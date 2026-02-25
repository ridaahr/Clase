<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all();
        return view('index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $teacher = new Teacher($request->all());
        $teacher->save();
        return redirect()->route('index')->with('succes', 'Profesor guardado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        return view('teacher.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        return view("teacher.edit", compact("teacher"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $teacher->name = $request->name;
        $teacher->salary = $request->salary;
        $teacher->email = $request->email;
        $teacher->active = $request->active;
        $teacher->save();
        return view('teacher.show', compact('teacher'));
    }

    public function destroy(Teacher $teacher)
    {

        if ($teacher == null) {
            $message = "El profesor no existe";
        } else {
            //eliminamos
            Teacher::destroy($teacher->id);
            $message = "Profesor " . $teacher->name . " eliminado";
        }
        $teachers = Teacher::all();
        return redirect()->route('index')->with('deleted', $message);
    }
}
