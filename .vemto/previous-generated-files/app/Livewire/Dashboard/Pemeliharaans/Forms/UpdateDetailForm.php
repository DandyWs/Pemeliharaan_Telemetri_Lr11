<?php

namespace App\Livewire\Dashboard\Pemeliharaans\Forms;

use Livewire\Form;
use App\Models\Pemeliharaan;
use Livewire\Attributes\Rule;

class UpdateDetailForm extends Form
{
    public ?Pemeliharaan $pemeliharaan;

    public $tanggalPemeliharaan = '';

    public $waktuMulaiPemeliharaan = '';

    public $periodePemeliharaan = '';

    public $cuaca = '';

    public $no_alatUkur = '';

    public $no_GSM = '';

    public $alat_telemetri_id = '';

    public function rules(): array
    {
        return [
            'tanggalPemeliharaan' => ['required', 'date'],
            'waktuMulaiPemeliharaan' => ['required', 'date'],
            'periodePemeliharaan' => ['required', 'string'],
            'cuaca' => ['required', 'string'],
            'no_alatUkur' => ['required'],
            'no_GSM' => ['required'],
            'alat_telemetri_id' => ['required'],
        ];
    }

    public function setPemeliharaan(Pemeliharaan $pemeliharaan)
    {
        $this->pemeliharaan = $pemeliharaan;

        $this->tanggalPemeliharaan = $pemeliharaan->tanggalPemeliharaan;
        $this->waktuMulaiPemeliharaan = $pemeliharaan->waktuMulaiPemeliharaan;
        $this->periodePemeliharaan = $pemeliharaan->periodePemeliharaan;
        $this->cuaca = $pemeliharaan->cuaca;
        $this->no_alatUkur = $pemeliharaan->no_alatUkur;
        $this->no_GSM = $pemeliharaan->no_GSM;
        $this->alat_telemetri_id = $pemeliharaan->alat_telemetri_id;
    }

    public function save()
    {
        $this->validate();

        $this->pemeliharaan->update($this->except(['pemeliharaan']));
    }
}
