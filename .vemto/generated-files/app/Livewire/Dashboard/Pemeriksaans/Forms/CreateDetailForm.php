<?php

namespace App\Livewire\Dashboard\Pemeriksaans\Forms;

use Livewire\Form;
use App\Models\Pemeriksaan;
use Livewire\Attributes\Rule;

class CreateDetailForm extends Form
{
    public $user_id = null;

    #[Rule('required|boolean')]
    public $hasilPemeriksaan = '';

    #[Rule('required|string')]
    public $catatan = '';

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
