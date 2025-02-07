<?php

namespace App\Http\Livewire\Frontend\Doctor;

use App\Models\Doctor;
use App\Models\Type;
use Livewire\Component;

class Index extends Component
{
    public $doctors, $hospital, $typeInputs = [], $priceInput = null, $types, $nameInput = null;
    protected $queryString = [
        'typeInputs' => ['except' => null, 'as' => 'type'],
        'priceInput' => ['except' => null, 'as' => 'price'],
        'nameInput' => ['except' => null, 'as' => 'name_of_specialty'],
    ];

    public function mount($hospital)
    {
        $this->hospital = $hospital;
        $this->types = Type::where('status', '0')->get();
    }

    public function render()
    {
        $this->doctors = Doctor::where('hospitals_id', $this->hospital->id)
            ->when($this->typeInputs, function($q) {
                $q->whereIn('type', $this->typeInputs);
            })
            ->when($this->priceInput, function($q) {
                $q->when($this->priceInput == 'high-to-low', function($q2) {
                    $q2->orderBy('original_price', 'DESC');
                })
                ->when($this->priceInput == 'low-to-high', function($q2) {
                    $q2->orderBy('original_price', 'ASC');
                });
            })
            ->when($this->nameInput, function($q) {
                $q->when($this->nameInput == 'a-z', function($q2) {
                    $q2->orderBy('name_of_specialty', 'ASC');
                })
                ->when($this->nameInput == 'z-a', function($q2) {
                    $q2->orderBy('name_of_specialty', 'DESC');
                });
            })

            ->where('status', '0')
            ->get();

        return view('livewire.frontend.doctor.index', [
            'doctors' => $this->doctors,
            'hospital' => $this->hospital,
            'types' => $this->types,
        ]);
    }
}

