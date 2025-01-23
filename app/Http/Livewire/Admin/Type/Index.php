<?php

namespace App\Http\Livewire\Admin\Type;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.type.index')
                    ->extends('layouts.admin')
                    ->section('content');
    }
}
