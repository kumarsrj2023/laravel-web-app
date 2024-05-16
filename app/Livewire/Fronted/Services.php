<?php

namespace App\Livewire\Fronted;

use App\Models\Service;
use Livewire\Component;

class Services extends Component
{
    public $services;
    public function mount(){
        $this->services = Service::orderBy('title', 'ASC')->get();
       
    }

    public function render()
    {
        return view('livewire.fronted.services')->layout('layouts.guest');
    }
}
