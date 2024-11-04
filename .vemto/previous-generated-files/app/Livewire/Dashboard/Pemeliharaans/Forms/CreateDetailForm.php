<?php

namespace App\Livewire\Dashboard\Pemeliharaans\Forms;

use Livewire\Form;
use App\Models\Pemeliharaan;
use Livewire\Attributes\Rule;

class CreateDetailForm extends Form
{
    public $user_id = null;

    #[Rule('required|date')]
    public $tanggalPemeliharaan = '';

    #[Rule('required|date')]
    public $waktuMulaiPemeliharaan = '';

    #[Rule('required|string')]
    public $periodePemeliharaan = '';

    #[Rule('required|string')]
    public $cuaca = '';

    #[Rule('required')]
    public $no_alatUkur = '';

    #[Rule('required')]
    public $no_GSM = '';

    #[Rule('required')]
    public $alat_telemetri_id = '';

    public function save()
    {
        $this->validate();

        $pemeliharaan = Pemeliharaan::create($this->except([]));

        $this->reset();

        return $pemeliharaan;
    }
}
