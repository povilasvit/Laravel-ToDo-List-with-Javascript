<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Requests\ToDoRequest;
use Carbon\Carbon;

use Illuminate\Http\Request;

class todoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $todos = Todo::all();
        //count percentage of remaining time
        foreach($todos as $todo){
            $timeStart = Carbon::createFromDate($todo->created_at)->timestamp; 
            $timeEnd = Carbon::createFromDate($todo->date)->timestamp;
            $timeNow = Carbon::createFromDate(Carbon::now())->timestamp;
            $persentage = ($timeEnd - $timeNow) / ($timeEnd - $timeStart) * 100;
            if($timeNow >= $timeEnd){
                $todo['persentage'] = 'Time is Expired!!!';
            } else {
                $todo['persentage'] = floor($persentage).'%';                
            }
        }

        return view('layouts.todo', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ToDoRequest $request)
    {
        $input = $request->only(['name', 'date']);
        Todo::create($input);

        return redirect('/todo')->with('success','ToDo Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return redirect('/todo')->with('danger','ToDo Deleted Successfully!');
    }

}
