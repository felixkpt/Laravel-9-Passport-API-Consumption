<?php

namespace App\Http\Controllers;

use App\Models\Task;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Task::all();
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return response(['msg' => $request->all()]);

        $request->validate([
            'text' => 'required|min:3|max:30|unique:tasks,text',
            'day' => 'required|date',
        ]);

        return Task::create($request->all());
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateReminder(Request $request, $id)
    {
        $task = Task::find($id);
        return $task->update(['reminder' => $request->get('reminder')]);
    }
    
    public function destroy($id) {
        return Task::destroy($id);;
    }

}
