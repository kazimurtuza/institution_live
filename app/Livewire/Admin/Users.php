<?php

namespace App\Livewire\Admin;
use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public function render()
    {
        $all_users = User::where('usertype', 0)->get();
        return view('livewire.admin.users', ['all_data' => $all_users])->layout('layouts.admin_base');
    }
}
