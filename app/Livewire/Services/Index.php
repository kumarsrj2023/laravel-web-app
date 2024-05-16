<?php

namespace App\Livewire\Services;

use App\Models\Service;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $services = Service::orderBy('title', 'ASC')->get();
        return view('livewire.services.index', ['services' => $services])->layout('layouts.app');
    }
}
