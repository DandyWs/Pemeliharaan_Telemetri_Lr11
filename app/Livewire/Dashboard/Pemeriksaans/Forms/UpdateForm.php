<?php

namespace App\Livewire\Dashboard\Pemeriksaans\Forms;

use Livewire\Form;
use App\Models\Pemeriksaan;
use Illuminate\Validation\Rule;

class UpdateForm extends Form
{
    public ?Pemeriksaan $pemeriksaan;

    public $hasilPemeriksaan = '';

    public $catatan = '';

    public $user_id = '';

    public $pemeliharaan_id = '';

    public function rules(): array
    {
        return [
            'hasilPemeriksaan' => ['required', 'boolean'],
            'catatan' => ['required', 'string'],
            'user_id' => ['required'],
            'pemeliharaan_id' => ['required'],
        ];
    }

    public function setPemeriksaan(Pemeriksaan $pemeriksaan)
    {
        $this->pemeriksaan = $pemeriksaan;

        $this->hasilPemeriksaan = $pemeriksaan->hasilPemeriksaan;
        $this->catatan = $pemeriksaan->catatan;
        $this->user_id = $pemeriksaan->user_id;
        $this->pemeliharaan_id = $pemeriksaan->pemeliharaan_id;
    }

    public function save()
    {
        $this->validate();

        $this->pemeriksaan->update(
            $this->except(['pemeriksaan', 'user_id', 'pemeliharaan_id'])
        );
    }
}
