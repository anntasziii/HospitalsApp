<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\DoctorImage;
use App\Models\DoctorTime;
use App\Models\Type;
use App\Models\Time;

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
        $times = Time::where('status', '0')->get();
        return view('admin.doctors.create', compact('hospitals', 'types', 'times'));
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

        if($request->times){
            foreach($request->times as $key => $time){
                $doctor->doctorTimes()->create([
                    'doctor_id' => $doctor->id,
                    'time_id' => $time,
                    'quantity' => $request->timequantity[$key] ?? 0
                ]);
            }
        }

        return redirect('/admin/doctors')->with('message', 'Doctor Added Successfully');
    }

    public function edit(int $doctor_id){
        $hospitals = Hospital::all();
        $types = Type::all();
        $doctor = Doctor::findOrFail($doctor_id);

        $doctor_time = $doctor->doctorTimes->pluck('time_id')->toArray();
        $times = Time::whereNotIn('id',$doctor_time)->get();

        return view('admin.doctors.edit', compact('hospitals', 'types', 'doctor', 'times'));
    }
    public function update(DoctorFormRequest $request, int $doctor_id){
        $validatedData = $request->validated();
        $doctor = Hospital::findOrFail($validatedData['hospitals_id'])
                    ->doctors()->where('id', $doctor_id)->first();
        if($doctor){
            $doctor->update([
                'hospitals_id' => $validatedData['hospitals_id'],
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
            if($request->times){
                foreach($request->times as $key => $time){
                    $doctor->doctorTimes()->create([
                        'doctor_id' => $doctor->id,
                        'time_id' => $time,
                        'quantity' => $request->timequantity[$key] ?? 0
                    ]);
                }
            }
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
    public function updateDoctorTimeQty(Request $request, $doctor_time_id){
        $doctorTimeData = Doctor::findOrFail($request->doctor_id)
                                ->doctorTimes()->where('id', $doctor_time_id)->first();
        $doctorTimeData->update([
            'quantity' => $request->qty
        ]);
        return response()->json(['message'=>'Doctor Time Qty Updated']);
    }
    public function deleteDoctorTime($doctor_time_id){
        $doctorTime = DoctorTime::findOrFail($doctor_time_id);
        $doctorTime->delete();
        return response()->json(['message'=>'Doctor Time Deleted']);
    }
}

