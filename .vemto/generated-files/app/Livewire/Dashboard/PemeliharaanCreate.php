<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use App\Livewire\Dashboard\Pemeliharaans\Forms\CreateForm;

class PemeliharaanCreate extends Component
{
    use WithFileUploads;

    public CreateForm $form;
    public Collection $users;

    public function mount()
    {
        $this->users = User::pluck('name', 'id');
    }

    public function save()
    {
        $this->authorize('create', Pemeliharaan::class);

        $this->validate();

        $pemeliharaan = $this->form->save();

        return redirect()->route('dashboard.pemeliharaans.edit', $pemeliharaan);
    }

    public function render()
    {
        return view('livewire.dashboard.pemeliharaans.create', []);
    }
}
