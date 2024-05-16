<?php

namespace App\Livewire\OurTeam;

use Livewire\Component;
use App\Livewire\Forms\AddTeamForm;
use App\Models\OurTeam;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    public AddTeamForm $form;
    public $id;

    public function mount($id)
    {
        $this->id = $id;
        $this->form->setData($id);
    }

    public function saveFormData()
    {
        $this->form->onSubmit();
    }

    public function updateData()
    {
        $this->validate();

        $ourTeamData = OurTeam::find($this->id);

        if (!empty($this->form->image)) {
            $file_name = date('YmdHis') . '.' . $this->form->image->getClientOriginalExtension();
            $uploaded = $this->form->image->storeAs('admin/photos/ourteam', $file_name, 'public');
            $this->form->image = $uploaded;
        }
      
        $ourTeamData->name = $this->form->name;
        $ourTeamData->designation = $this->form->designation;
        $ourTeamData->facebook_url = $this->form->facebook_url;
        $ourTeamData->whatsapp_url = $this->form->whatsapp_url;
        $ourTeamData->linkdien_url = $this->form->linkdien_url;
        $ourTeamData->image = $uploaded ?? $ourTeamData->image;
        $ourTeamData->status = $this->form->status;
        $ourTeamData->updated_at = now();
        $ourTeamData->save();

        $this->form->reset();

        session()->flash('status', 'Member Data successfully updated.');
        $this->redirectRoute('admin.team.index');
    }

    public function deleteRecored(){
        $ourTeamData = OurTeam::find($this->postId);
        $ourTeamData->delete();
        session()->flash('status', 'Post successfully deleted.');
        $this->redirectRoute('admin.team.index');
    }
    public function render()
    {
        return view('livewire.our-team.edit')->layout('layouts.app');
    }
}
