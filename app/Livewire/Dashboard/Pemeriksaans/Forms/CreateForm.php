<?php

namespace App\Livewire\Dashboard\Pemeriksaans\Forms;

use Livewire\Form;
use App\Models\Pemeriksaan;
use Livewire\Attributes\Rule;

class CreateForm extends Form
{
    #[Rule('required|boolean')]
    public $hasilPemeriksaan = '';

    #[Rule('required|string')]
    public $catatan = '';

    #[Rule('required')]
    public $user_id = '';

    #[Rule('required')]
    public $pemeliharaan_id = '';

    public function save()
    {
        $this->validate();

        $pemeriksaan = Pemeriksaan::create($this->except([]));

        $this->reset();

        return $pemeriksaan;
    }
}
