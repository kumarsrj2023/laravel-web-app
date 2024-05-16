<?php

namespace App\Livewire\Services;
use App\Livewire\Forms\AddServiceForm;
use App\Models\Service;
use Illuminate\Support\Facades\Date;
use Livewire\WithFileUploads;

use Livewire\Component;

class Create extends Component
{
    use WithFileUploads;
    public AddServiceForm $form; 

    public function render()
    {
        return view('livewire.services.create')->layout('layouts.app');
    }

    public function submitService(){
        $this->validate();

        $file_name = date('YmdHis'). '.' . $this->form->icon_class->getClientOriginalExtension();

        $uploaded = $this->form->icon_class->storeAs('admin/photos/services',$file_name, 'public');

        $this->form->icon_class = $uploaded;

        Service::create(
            $this->form->all() 
        );
        $this->form->reset();

        session()->flash('status', 'Post successfully updated.');
        // $this->dispatch('toast');
        // $this->dispatch('swal.fire');
        $this->redirectRoute('admin.services.index');
    }
}
