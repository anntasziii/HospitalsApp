<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\DoctorImage;
use App\Models\Type;
use App\Http\Requests\DoctorFormRequest;

use Illuminate\Support\Facades\File;
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

    public function edit(int $doctor_id){
        $hospitals = Hospital::all();
        $types = Type::all();
        $doctor = Doctor::findOrFail($doctor_id);
        //$doctor_year = $doctor->doctorYears->pluck('year_id')->toArray();
        //$years = Year::whereNotIn('id',$doctor_year)->get();
        return view('admin.doctors.edit', compact('hospitals', 'types', 'doctor'));
    }
    public function update(DoctorFormRequest $request, int $doctor_id){
        $validatedData = $request->validated();
        $doctor = Hospital::findOrFail($validatedData['hospital_id'])
                    ->doctors()->where('id', $doctor_id)->first();
        if($doctor){
            $doctor->update([
                'hospital_id' => $validatedData['hospital_id'],
                'name' => $validatedData['name'],
                'name_of_specialty' => $validatedData['name_of_specialty'],
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
            return redirect('/admin/doctors')->with('message', 'Doctor Updated Successfully');
        }
        else{
            return redirect('admin/doctors')->with('message', 'No Such Doctor Id Found');
        }
    }
    public function destroyImage(int $doctor_image_id){
        $doctorImage = DoctorImage::findOrFail($doctor_image_id);
        if(File::exists($doctorImage->image)){
            File::delete($doctorImage->image);
        }
        $doctorImage->delete();
        return redirect()->back()->with('message', 'Doctor Image Deleted');
    }
    public function destroy(int $doctor_id){
        $doctor = Doctor::findOrFail($doctor_id);
        if($doctor->doctorImages()){
            foreach($doctor->doctorImages as $image){
                if(File::exists($image->image)){
                    File::delete($image->image);
                }
            }
        }
        $doctor->delete();
        return redirect()->back()->with('message', 'Doctor Deleted with all images');
    }
}

