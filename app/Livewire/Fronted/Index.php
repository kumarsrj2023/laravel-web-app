<?php

namespace App\Livewire\Fronted;

use App\Models\Service;
use Livewire\Component;

class Index extends Component
{
    public $services;

    public function mount(){
        $this->services = Service::whereStatus(1)->get();
    }
    public function render()
    {
        // $services = Service::whereStatus(1)->get();
        // return view('livewire.fronted.index', ['services' => $services])->layout('layouts.guest');
        return view('livewire.fronted.index')->layout('layouts.guest');
    }
}
