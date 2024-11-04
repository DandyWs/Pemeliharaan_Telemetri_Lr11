<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use Livewire\Component;
use App\Models\Pemeliharaan;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use App\Livewire\Dashboard\Pemeriksaans\Forms\CreateForm;

class PemeriksaanCreate extends Component
{
    use WithFileUploads;

    public CreateForm $form;
    public Collection $users;
    public Collection $pemeliharaans;

    public function mount()
    {
        $this->users = User::pluck('name', 'id');
        $this->pemeliharaans = Pemeliharaan::pluck('periodePemeliharaan', 'id');
    }

    public function save()
    {
        $this->authorize('create', Pemeriksaan::class);

        $this->validate();

        $pemeriksaan = $this->form->save();

        return redirect()->route('dashboard.pemeriksaans.edit', $pemeriksaan);
    }

    public function render()
    {
        return view('livewire.dashboard.pemeriksaans.create', []);
    }
}
