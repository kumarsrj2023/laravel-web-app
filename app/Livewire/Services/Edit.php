<?php

namespace App\Livewire\Services;

use App\Models\Service;
use Livewire\Component;
use App\Livewire\Forms\AddServiceForm;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    public AddServiceForm $form;
    public $postId;
    public function mount(Service $id)
    {
        $this->postId = $id->id;
        $this->form->title = $id->title;
        $this->form->short_desc = $id->short_desc;
        $this->form->description = $id->description;
        $this->form->status = $id->status;
        $this->form->oldIcon_class = $id->icon_class;
    }

    public function updateService()
    {
        $this->validate();

        $serviceData = Service::find($this->postId);

        if ($this->form->icon_class) {
            $file_name = date('YmdHis') . '.' . $this->form->icon_class->getClientOriginalExtension();
            $uploaded = $this->form->icon_class->storeAs('admin/photos/services', $file_name, 'public');
            $this->form->icon_class = $uploaded;
        }

        $serviceData->title = $this->form->title;
        if (!empty($uploaded)) {
            $serviceData->icon_class = $uploaded;
        }
        $serviceData->short_desc = $this->form->short_desc;
        $serviceData->description = $this->form->description;
        $serviceData->status = $this->form->status;
        $serviceData->updated_at = now();
        $serviceData->save();

        $this->form->reset();

        session()->flash('status', 'Post successfully updated.');
        $this->redirectRoute('admin.services.index');
    }

    public function deleteRecored(){
        $serviceData = Service::find($this->postId);
        $serviceData->delete();
        session()->flash('status', 'Post successfully deleted.');
        $this->redirectRoute('admin.services.index');
    }
    
    public function render()
    {
        return view('livewire.services.edit')->layout('layouts.app');
    }
}
