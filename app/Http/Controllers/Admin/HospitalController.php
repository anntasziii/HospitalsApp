<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use Illuminate\Http\Request;
use App\Http\Requests\HospitalFormRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class HospitalController extends Controller
{
    public function index() {
        return view('admin.hospital.index');
    }

    public function create() {
        return view('admin.hospital.create');
    }

    public function store(HospitalFormRequest $request) {
        $validatedData = $request->validated();

        $hospital = new Hospital;
        $hospital->name = $validatedData['name'];
        $hospital->sity = $validatedData['sity'];
        $hospital->region = $validatedData['region'];
        $hospital->slug = Str::slug($validatedData['slug']);
        $hospital->description = $validatedData['description'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/hospital/', $filename);
            $hospital->image = 'uploads/hospital/' . $filename;
        }

        $hospital->meta_title = $validatedData['meta_title'];
        $hospital->meta_keyword = $validatedData['meta_keyword'];
        $hospital->meta_description = $validatedData['meta_description'];

        $hospital->status = $request->status ? '1' : '0';
        $hospital->save();

        return redirect('admin/hospital')->with('message', 'Hospital Added Successfully');
    }

    public function edit(Hospital $hospital) {
        return view('admin.hospital.edit', compact('hospital'));
    }

    public function update(HospitalFormRequest $request, $hospitalId) {
        $validatedData = $request->validated();
        $hospital = Hospital::findOrFail($hospitalId);

        $hospital->name = $validatedData['name'];
        $hospital->sity = $validatedData['sity'];
        $hospital->region = $validatedData['region'];
        $hospital->slug = Str::slug($validatedData['slug']);
        $hospital->description = $validatedData['description'];

        if ($request->hasFile('image')) {
            $path = 'uploads/hospital/' . $hospital->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/hospital/', $filename);
            $hospital->image = 'uploads/hospital/' . $filename;
        }

        $hospital->meta_title = $validatedData['meta_title'];
        $hospital->meta_keyword = $validatedData['meta_keyword'];
        $hospital->meta_description = $validatedData['meta_description'];

        $hospital->status = $request->status ? '1' : '0';
        $hospital->save();

        return redirect('admin/hospital')->with('message', 'Hospital Updated Successfully');
    }
}

