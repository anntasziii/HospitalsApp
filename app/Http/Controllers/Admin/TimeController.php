<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Time;
use App\Http\Requests\TimeFormRequest;

class TimeController extends Controller
{
    public function index(){
        $times = Time::all();
        return view('admin.times.index', compact('times'));
    }
    public function create(){
        return view('admin.times.create');
    }
    public function store(TimeFormRequest $request){
        $validatedData = $request->validated();
        $validatedData['status'] = $request->status == true ? '1':'0';
        Time::create($validatedData);
        return redirect('admin/times')->with('message', 'Time Added Successfully');
    }
    public function edit(Time $time){
        return view('admin.times.edit', compact('time'));
    }
    public function update(TimeFormRequest $request, $time_id){
        $validatedData = $request->validated();
        $validatedData['status'] = $request->status == true ? '1':'0';
        Time::find($time_id)->update($validatedData);
        return redirect('admin/times')->with('message', 'Time Updated Successfully');
    }
    public function destroy($time_id){
        $time = Time::findOrFail($time_id);
        $time->delete();
        return redirect('admin/times')->with('message', 'Time Deleted Successfully');
    }

}
