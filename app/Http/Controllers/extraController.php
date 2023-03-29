<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Requests\ToDoRequest;
use Carbon\Carbon;

class extraController extends Controller
{
    public function done($id)
    {
        $todo = ToDo::findOrFail($id);
        $todo->status = 1;
        $todo->update();

         return redirect('/todo')->with('succes', 'Todo Completed! :)');
    }

    public function clearTaskList(){
        $tdos = ToDo::all()->where('status', 1);
        foreach($tdos as $todo){
            $todo->delete();
        }
        $todos = ToDo::all();
        return redirect('/todo')->with('danger','All Completed ToDos Cleared Successfully!');    
    }

    public function editTask($id){
        $todos = Todo::all();
        $tdo = ToDo::findOrFail($id);

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

        if($todos->where('status', 0)->count() > 0){
            return view('layouts.editTask', compact('todos'), compact('tdo'));
        } else {
          return view('layouts.todo', compact('todos'));
        }
    }

    public function updateTask(ToDoRequest $request, $id){
        $todo = ToDo::findOrFail($id);
        if($request->date == ''){
            $todo->name = $request->name; 
            $todo->update();           
            return redirect('/todo');
        } else{
            $todo->name = $request->name;   
            $todo->date = $request->date;
            $todo->update();  
            
            return redirect('/todo')->with('success','ToDo Updated Successfully!');
        }
    }

}
