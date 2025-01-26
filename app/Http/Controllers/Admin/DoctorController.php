<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Type;
use App\Http\Requests\DoctorFormRequest;

use Illuminate\Support\Str;
use PhpParser\Comment\Doc;

class DoctorController extends Controller
{
    public function index(){
        $doctors = Doctor::all();
        return view('admin.doctors.index', compact('doctors'));
    }
    public function create(){
        $hospitals = Hospital::all();
        $types = Type::all();
        //$years = Year::where('status', '0')->get();
        return view('admin.doctors.create', compact('hospitals', 'types'));
    }
    public function store(DoctorFormRequest $request){
        $validatedData = $request->validated();
        $hospital = Hospital::findOrFail($validatedData['hospitals_id']);
        $doctor = $hospital->doctors()->create([
            'hospitals_id' => $validatedData['hospitals_id'],
            'name_of_specialty' => $validatedData['name_of_specialty'],
            'name' => $validatedData['name'],
            'surname' => $validatedData['surname'],
            'slug' => Str::slug($validatedData['slug']),
            'type' => $validatedData['type'],
            'small_description' => $validatedData['small_description'],
            'description' => $validatedData['description'],
            'original_price' => $validatedData['original_price'],
            'quantity' => $validatedData['quantity'],
            'trending' => $request->trending == true ? '1':'0',
            'featured' => $request->featured == true ? '1':'0',
            'status' => $request->status == true ? '1':'0',
            'meta_title' => $validatedData['meta_title'],
            'meta_keyword' => $validatedData['meta_keyword'],
            'meta_description' => $validatedData['meta_description'],
        ]);
        if($request->hasFile('image')){
            $uploadPath = 'uploads/doctors/';
            $i = 1;
            foreach($request->file('image') as $imageFile){
                $extention = $imageFile->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extention;
                $imageFile->move($uploadPath,$filename);
                $finalImagePathName = $uploadPath.$filename;

                $doctor->doctorImages()->create([
                    'doctor_id' => $doctor->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }
        // if($request->years){
        //     foreach($request->years as $key => $year){
        //         $doctor->doctorYears()->create([
        //             'doctor_id' => $doctor->id,
        //             'year_id' => $year,
        //             'quantity' => $request->yearquantity[$key] ?? 0
        //         ]);
        //     }
        // }

        return redirect('/admin/doctors')->with('message', 'Doctor Added Successfully');
    }
}
