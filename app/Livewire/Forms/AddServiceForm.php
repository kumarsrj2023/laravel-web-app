<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class AddServiceForm extends Form
{
    #[Validate('required|min:5')]
    public $title = '';
 
    // #[Validate('required|min:5')]
    public $icon_class = '';

    #[Validate('required|min:5')]
    public $short_desc = '';

    // #[Validate('required|min:5')]
    public $description = '';

    #[Validate('required')]
    public $status = '';

    public $oldIcon_class = '';
}
