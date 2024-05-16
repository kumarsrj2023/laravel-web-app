<?php

namespace App\Livewire\Forms;

use App\Models\OurTeam;
use Livewire\Attributes\Validate;
use Livewire\Form;



class AddTeamForm extends Form
{
    public $oldImage = '';
    // public $memberId = '';

    #[Validate('required|min:5')]
    public $name = '';

    #[Validate('required')]
    public $designation = '';

    // #[Validate('required|min:5')]
    public $facebook_url = '';

    // #[Validate('required|min:5')]
    public $whatsapp_url = '';

    // #[Validate('required|min:5')]
    public $linkdien_url = '';

    // #[Validate('required')]
    public $image = '';

    #[Validate('required')]
    public $status = '';


    public function onSubmit()
    {
        $this->validate();

        if (!empty($this->image)) {
            $fileName = date('Ymdhis') . '.' . $this->image->getClientOriginalExtension();
            $uploadImage = $this->image->storeAs('admin/photos/ourteam', $fileName, 'public');
        }

        $data = [
            'name' => $this->name,
            'designation' => $this->designation,
            'facebook_url' => $this->facebook_url,
            'whatsapp_url' => $this->whatsapp_url,
            'linkdien_url' => $this->linkdien_url,
            'image' => $uploadImage ?? '',
            'status' => $this->status,
        ];

        $success = OurTeam::create($data);
        return $success;
    }

    public function setData($id = null)
    {
        $data = OurTeam::find($id);
        if (!empty($data)) {
            $this->name = $data->name;
            $this->designation = $data->designation;
            $this->facebook_url = $data->facebook_url;
            $this->whatsapp_url = $data->whatsapp_url;
            $this->linkdien_url = $data->linkdien_url;
            // $this->image = $data->image;
            $this->status = $data->status;
            $this->oldImage = $data->image;
        }
    }
}
