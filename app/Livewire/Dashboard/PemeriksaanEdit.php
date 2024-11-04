<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use Livewire\Component;
use App\Models\Pemeriksaan;
use App\Models\Pemeliharaan;
use Illuminate\Support\Collection;
use App\Livewire\Dashboard\Pemeriksaans\Forms\UpdateForm;

class PemeriksaanEdit extends Component
{
    public ?Pemeriksaan $pemeriksaan = null;

    public UpdateForm $form;
    public Collection $users;
    public Collection $pemeliharaans;

    public function mount(Pemeriksaan $pemeriksaan)
    {
        $this->authorize('view-any', Pemeriksaan::class);

        $this->pemeriksaan = $pemeriksaan;

        $this->form->setPemeriksaan($pemeriksaan);
        $this->users = User::pluck('name', 'id');
        $this->pemeliharaans = Pemeliharaan::pluck('periodePemeliharaan', 'id');
    }

    public function save()
    {
        $this->authorize('update', $this->pemeriksaan);

        $this->validate();

        $this->form->save();

        $this->dispatch('saved');
    }

    public function render()
    {
        return view('livewire.dashboard.pemeriksaans.edit', []);
    }
}
