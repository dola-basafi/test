<?php

namespace App\Http\Controllers;

use App\Models\MCategoryTask;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    function create(){
        $data = MCategoryTask::all();
        return view('createTask',compact('data'));
    }
    function edit(Request $request,$id){
        $data = MCategoryTask::all();
        $task = Task::find($id);
      return view('editTask',compact('data','task'));
    }
    function index(Request $request){
        $data = Task::with('category')->where('user_id',$request->user()->id)->get();
        
        return view('task',compact('data'));
    }
    function store(Request $request){
        $validate = $request->validate([
            'task' => ['required'],
            'category_id' => ['required']
        ]);
        

        $validate['user_id']= $request->user()->id;
        Task::create($validate);
        return redirect()->route('taskIndex')->with('success','berhasil menambahkan task');
    }
    function detail(Request $request, $id){
        $data = Task::all();
        return view('editTask',compact('data'));
    }
    function update(Request $request,$id){
        $data = Task::find($id);
        $validate = $request->validate([
            'task' => ['required'],
            'category_id' => ['required']
        ]);
        // $validate['user_id'] = $request->user()->id;
        $data->update($validate);
        return redirect()->route('taskIndex')->with('success','berhasil mengubah task');

    }
    function destroy(Request $request, $id){
        $data = Task::find($id);

        $data->delete();
        return redirect()->route('taskIndex')->with('success','berhasil menghapus task');
    }
}
