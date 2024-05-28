<?php

namespace App\Livewire\Admin;
use App\Models\KeyFeaturs;
use Livewire\Component;

class KeyFeatures extends Component
{
    public function render()
    {
        $all_featurs = KeyFeaturs::where('is_delete', 0)->get();
        return view('livewire.admin.key-features', ['all_data' => $all_featurs])->layout('layouts.admin_base');
    }
}
