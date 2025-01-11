<?php

namespace App\Http\Livewire\Admin\Hospital;

use App\Models\Hospital;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $hospital_id;
    public function deleteHospital($hospital_id)
    {
        $this->hospital_id = $hospital_id;
    }
    public function destroyHospital(){
        $hospital = Hospital::find($this->hospital_id);
        $path = 'uploads/hospital/'.$hospital->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $hospital->delete();
        session()->flash('message', 'Hospital Deleted');
        $this->dispatchBrowserEvent('close-modal');
    }
    public function render()
    {
        $hospitals = Hospital::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.hospital.index', ['hospitals' => $hospitals]);
    }

}

