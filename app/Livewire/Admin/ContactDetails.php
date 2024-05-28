<?php

namespace App\Livewire\Admin;
use App\Models\ContactInfo as ContactInfoDB;
use Livewire\Component;

class ContactDetails extends Component
{
    public function mount($contact_id)
    {
        $this->contact_id = $contact_id;
    }
    public function render()
    {
        $contact_details = ContactInfoDB::where('id', $this->contact_id)->first();
        return view('livewire.admin.contact-details',['contact_details' => $contact_details])->layout('layouts.admin_base');
    }
}
