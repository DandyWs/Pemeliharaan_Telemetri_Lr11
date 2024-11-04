<?php

namespace App\Livewire\Dashboard\Pemeriksaans\Forms;

use Livewire\Form;
use App\Models\Pemeriksaan;
use Livewire\Attributes\Rule;

class UpdateDetailForm extends Form
{
    public ?Pemeriksaan $pemeriksaan;

    public $hasilPemeriksaan = '';

    public $catatan = '';

    public $pemeliharaan_id = '';

    public function rules(): array
    {
        return [
            'hasilPemeriksaan' => ['required', 'boolean'],
            'catatan' => ['required', 'string'],
            'pemeliharaan_id' => ['required'],
        ];
    }

    public function setPemeriksaan(Pemeriksaan $pemeriksaan)
    {
        $this->pemeriksaan = $pemeriksaan;

        $this->hasilPemeriksaan = $pemeriksaan->hasilPemeriksaan;
        $this->catatan = $pemeriksaan->catatan;
        $this->pemeliharaan_id = $pemeriksaan->pemeliharaan_id;
    }

    public function save()
    {
        $this->validate();

        $this->pemeriksaan->update(
            $this->except(['pemeriksaan', 'pemeliharaan_id'])
        );
    }
}
