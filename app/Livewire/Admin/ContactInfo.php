<?php

namespace App\Livewire\Admin;
use App\Models\ContactInfo as ContactInfoDB;
use Livewire\Component;

class ContactInfo extends Component
{
    public function render()
    {
        $all_data = ContactInfoDB::all();
        return view('livewire.admin.contact-info', ['all_data' => $all_data])->layout('layouts.admin_base');
    }
}
