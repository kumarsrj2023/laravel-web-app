<?php

namespace App\Livewire\OurTeam;
use App\Livewire\Forms\AddTeamForm;
use Livewire\WithFileUploads;

use Livewire\Component;

class Create extends Component
{
    use WithFileUploads;
    public AddTeamForm $form;

    public function saveFormData(){
        $succes = $this->form->onSubmit();
        if($succes){
            $this->form->reset();
            session()->flash('message', 'Team Added Successfully');
            $this->redirectRoute('admin.team.index');
        }
    }
    public function render()
    {
        return view('livewire.our-team.create')->layout('layouts.app');
    }
}
