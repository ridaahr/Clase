<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('test.create', compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $test = new Test($request->all());
        $test->save();
        return redirect()->route('index')->with('succes', 'Test guardado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Test $test)
    {
        return view('test.show', compact('test'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Test $test)
    {
        $subjects = Subject::all();
        return view('test.edit', compact('test', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Test $test)
    {
        $test->name = $request->name;
        $test->numberQuestions = $request->numberQuestions;
        $test->type = $request->type;
        $test->subject_id = $request->subject_id;
        $test->save();
        return redirect()->route('subject.show', $test)->with('success', 'Test editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Test $test)
    {
        Test::destroy($test->id);
        return  redirect()->route('teacher.show', $test)->with('success', 'Test eliminado');
    }
}
