<?php

namespace App\Livewire\Fronted;

use App\Models\Service;
use Livewire\Component;

class SingleService extends Component
{

    public $service;
    public function mount($id){
        $service = Service::find($id);
        if(!empty($service)){
            $this->service = $service;
        }
    }
    public function render()
    {
        return view('livewire.fronted.single-service')->layout('layouts.guest');
    }
}
