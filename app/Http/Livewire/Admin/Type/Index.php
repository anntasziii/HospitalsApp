<?php

namespace App\Http\Livewire\Admin\Type;

use Livewire\Component;

use App\Models\Type;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name, $slug, $status;

    public function rules(){
        return[
            'name'=>'required|string',
            'slug'=>'required|string',
            //'category_id' => 'required|integer',
            'status'=>'nullable'
        ];
    }
    public function resetInput(){
        $this->name = NULL;
        $this->slug = NULL;
        $this->status = NULL;
        // $this->type_id = NULL;
        // $this->hospital_id = NULL;
    }
    public function storeType(){
        $validatedData = $this->validate();
        Type::create([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1':'0',
            //'category_id' => $this->category_id
        ]);
        session()->flash('message','Type Added Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }
    public function closeModal(){
        $this->resetInput();
    }
    public function openModal(){
        $this->resetInput();
    }
    public function render()
    {
        $types = Type::orderBY('id', 'DESC')->paginate(10);
        return view('livewire.admin.type.index', ['types' => $types])
                    ->extends('layouts.admin')
                    ->section('content');
    }
}
