<?php

namespace App\Http\Livewire\Frontend\Doctor;

use App\Models\Doctor;
use Livewire\Component;

class Index extends Component
{
    public $doctors, $hospital, $typeInputs = [], $priceInput;
    protected $queryString = [
        'typeInputs' => ['except' => '', 'as' => 'type'],
        'priceInput' => ['except' => '', 'as' => 'price'],
    ];
    public function mount($hospital){
        $this->hospital = $hospital;
    }
    public function render()
    {
        $this->doctors = Doctor::where('hospitals_id', $this->hospital->id)
                            ->when($this->typeInputs, function($q){
                                $q->whereIn('type', $this->typeInputs);
                            })
                            ->when($this->priceInput, function($q){
                                $q->when($this->priceInput == 'high-to-low', function($q2){
                                    $q2->orderBy('original_price', 'DESC');
                                })
                                ->when($this->priceInput == 'low-to-high', function($q2){
                                    $q2->orderBy('original_price', 'ASC');
                                });
                            })
                            ->where('status', '0')
                            ->get();
        return view('livewire.frontend.doctor.index', [
            'doctors' => $this->doctors,
            'hospital' => $this->hospital
        ]);
    }
}
