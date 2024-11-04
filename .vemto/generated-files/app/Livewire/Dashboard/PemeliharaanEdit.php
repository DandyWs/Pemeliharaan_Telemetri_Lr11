<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use Livewire\Component;
use App\Models\Pemeliharaan;
use Illuminate\Support\Collection;
use App\Livewire\Dashboard\Pemeliharaans\Forms\UpdateForm;

class PemeliharaanEdit extends Component
{
    public ?Pemeliharaan $pemeliharaan = null;

    public UpdateForm $form;
    public Collection $users;

    public function mount(Pemeliharaan $pemeliharaan)
    {
        $this->authorize('view-any', Pemeliharaan::class);

        $this->pemeliharaan = $pemeliharaan;

        $this->form->setPemeliharaan($pemeliharaan);
        $this->users = User::pluck('name', 'id');
    }

    public function save()
    {
        $this->authorize('update', $this->pemeliharaan);

        $this->validate();

        $this->form->save();

        $this->dispatch('saved');
    }

    public function render()
    {
        return view('livewire.dashboard.pemeliharaans.edit', []);
    }
}
