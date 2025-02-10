<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class LogoutAction extends Component
{
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.dashboard.logout-action');
    }
}
