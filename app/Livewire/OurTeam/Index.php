<?php

namespace App\Livewire\OurTeam;

use App\Models\OurTeam;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $teamData = OurTeam::orderBy('id', 'DESC')->get();
        return view('livewire.our-team.index', ['teamdata' => $teamData])->layout('layouts.app');
    }
}
