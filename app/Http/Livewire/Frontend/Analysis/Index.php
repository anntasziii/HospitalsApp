<?php

namespace App\Http\Livewire\Frontend\Analysis;

use App\Models\Analysis;
use Livewire\Component;
use App\Models\Type;

class Index extends Component
{
    public $analyses, $hospital, $typeInputs = [], $priceInput, $types, $nameInput = null;

    protected $queryString = [
        'typeInputs' => ['except' => null, 'as' => 'type'],
        'priceInput' => ['except' => null, 'as' => 'price'],
        'nameInput' => ['except' => null, 'as' => 'name'],
    ];

    public function mount($hospital)
    {
        $this->hospital = $hospital;
        $this->types = Type::where('status', '0')->get();
        $this->nameInput = request()->query('name', null);
    }

    public function render()
    {
        $query = Analysis::where('hospitals_id', $this->hospital->id)
            ->where('status', '0')
            ->when($this->typeInputs, function ($q) {
                $q->whereIn('type', $this->typeInputs);
            });

        if ($this->priceInput == 'high-to-low') {
            $query->orderBy('original_price', 'DESC');
        } elseif ($this->priceInput == 'low-to-high') {
            $query->orderBy('original_price', 'ASC');
        }

        if ($this->nameInput == 'a-z') {
            $query->orderBy('name', 'ASC');
        } elseif ($this->nameInput == 'z-a') {
            $query->orderBy('name', 'DESC');
        }

        $this->analyses = $query->get();

        return view('livewire.frontend.analysis.index', [
            'analyses' => $this->analyses,
            'hospital' => $this->hospital,
            'types' => $this->types,
        ]);
    }

}
