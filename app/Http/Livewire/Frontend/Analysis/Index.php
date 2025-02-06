<?php

namespace App\Http\Livewire\Frontend\Analysis;

use App\Models\Analysis;
use Livewire\Component;

class Index extends Component
{
    public $analyses, $hospital, $typeInputs = [], $priceInput;

    protected $queryString = [
        'typeInputs' => ['except' => '', 'as' => 'type'],
        'priceInput' => ['except' => '', 'as' => 'price'],
    ];

    public function mount($hospital)
    {
        $this->hospital = $hospital;
    }

    public function render()
    {
        $query = Analysis::where('hospitals_id', $this->hospital->id)
                         ->where('status', '0');

        if (!empty($this->typeInputs)) {
            $query->whereIn('type', $this->typeInputs);
        }

        if ($this->priceInput) {
            if ($this->priceInput == 'high-to-low') {
                $query->orderBy('original_price', 'DESC');
            } elseif ($this->priceInput == 'low-to-high') {
                $query->orderBy('original_price', 'ASC');
            }
        }

        $this->analyses = $query->get();

        return view('livewire.frontend.analysis.index', [
            'analyses' => $this->analyses,
            'hospital' => $this->hospital
        ]);
    }
}
