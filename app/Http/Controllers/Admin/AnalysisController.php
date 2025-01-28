<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Analysis;
use App\Models\Hospital;
use App\Models\AnalysisImage;
use App\Models\AnalysisTime;
use App\Models\Type;
use App\Models\Time;

use App\Http\Requests\AnalysisFormRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AnalysisController extends Controller
{
    public function index(){
        $analyses = Analysis::all();
        return view('admin.analyses.index', compact('analyses'));
    }
    public function create(){
        $hospitals = Hospital::all();
        $types = Type::all();
        $times = Time::where('status', '0')->get();
        return view('admin.analyses.create', compact('hospitals', 'types', 'times'));
    }
    public function store(AnalysisFormRequest $request){
        $validatedData = $request->validated();
        $hospital = Hospital::findOrFail($validatedData['hospitals_id']);
        $analysis = $hospital->analyses()->create([
            'hospitals_id' => $validatedData['hospitals_id'],
            'name' => $validatedData['name'],
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
            $uploadPath = 'uploads/analyses/';
            $i = 1;
            foreach($request->file('image') as $imageFile){
                $extention = $imageFile->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extention;
                $imageFile->move($uploadPath,$filename);
                $finalImagePathName = $uploadPath.$filename;

                $analysis->analysisImages()->create([
                    'analysis_id' => $analysis->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }
        if($request->times){
            foreach($request->times as $key => $time){
                $analysis->analysisTimes()->create([
                    'analysis_id' => $analysis->id,
                    'time_id' => $time,
                    'quantity' => $request->timequantity[$key] ?? 0
                ]);
            }
        }

        return redirect('/admin/analyses')->with('message', 'Analysis Added Successfully');
    }
    public function edit(int $analysis_id){
        $hospitals = Hospital::all();
        $types = Type::all();
        $analysis = Analysis::findOrFail($analysis_id);

        $analysis_time = $analysis->analysisTimes->pluck('time_id')->toArray();
        $times = Time::whereNotIn('id',$analysis_time)->get();

        return view('admin.analyses.edit', compact('hospitals', 'types', 'analysis', 'times'));
    }
    public function update(AnalysisFormRequest $request, int $analysis_id){
        $validatedData = $request->validated();
        $analysis = Hospital::findOrFail($validatedData['hospitals_id'])
                    ->analyses()->where('id', $analysis_id)->first();
        if($analysis){
            $analysis->update([
                'hospitals_id' => $validatedData['hospitals_id'],
                'name' => $validatedData['name'],
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
                $uploadPath = 'uploads/analyses/';
                $i = 1;
                foreach($request->file('image') as $imageFile){
                    $extention = $imageFile->getClientOriginalExtension();
                    $filename = time().$i++.'.'.$extention;
                    $imageFile->move($uploadPath,$filename);
                    $finalImagePathName = $uploadPath.$filename;

                    $analysis->analysisImages()->create([
                        'analysis_id' => $analysis->id,
                        'image' => $finalImagePathName,
                    ]);
                }
            }
            if($request->times){
                foreach($request->times as $key => $time){
                    $analysis->analysisTimes()->create([
                        'analysis_id' => $analysis->id,
                        'time_id' => $time,
                        'quantity' => $request->timequantity[$key] ?? 0
                    ]);
                }
            }
            return redirect('/admin/analyses')->with('message', 'Analysis Updated Successfully');
        }
        else{
            return redirect('admin/analyses')->with('message', 'No Such Analyses Id Found');
        }
    }
    public function destroyImage(int $analysis_image_id){
        $analysisImage = AnalysisImage::findOrFail($analysis_image_id);
        if(File::exists($analysisImage->image)){
            File::delete($analysisImage->image);
        }
        $analysisImage->delete();
        return redirect()->back()->with('message', 'Analysis Image Deleted');
    }
    public function destroy(int $analysis_id){
        $analysis = Analysis::findOrFail($analysis_id);
        if($analysis->analysisImages()){
            foreach($analysis->analysisImages as $image){
                if(File::exists($image->image)){
                    File::delete($image->image);
                }
            }
        }
        $analysis->delete();
        return redirect()->back()->with('message', 'Analysis Deleted with all images');
    }
    public function updateAnalysisTimeQty(Request $request, $analysis_time_id){
        $analysisTimeData = Analysis::findOrFail($request->analysis_id)
                                ->analysisTimes()->where('id', $analysis_time_id)->first();
        $analysisTimeData->update([
            'quantity' => $request->qty
        ]);
        return response()->json(['message'=>'Analysis Time Qty Updated']);
    }
    public function deleteAnalysisTime($analysis_time_id){
        $analysisTime = AnalysisTime::findOrFail($analysis_time_id);
        $analysisTime->delete();
        return response()->json(['message'=>'Analysis Time Deleted']);
    }
}
