<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Pemeriksaan;
use Livewire\WithPagination;

class PemeriksaanIndex extends Component
{
    use WithPagination;

    public $search;
    public $sortField = 'updated_at';
    public $sortDirection = 'desc';

    public $queryString = ['search', 'sortField', 'sortDirection'];

    public $confirmingDeletion = false;
    public $deletingPemeriksaan;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDeletion(string $id)
    {
        $this->deletingPemeriksaan = $id;

        $this->confirmingDeletion = true;
    }

    public function delete(Pemeriksaan $pemeriksaan)
    {
        $pemeriksaan->delete();

        $this->confirmingDeletion = false;
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection =
                $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
    }

    public function getRowsProperty()
    {
        return $this->rowsQuery->paginate(5);
    }

    public function getRowsQueryProperty()
    {
        return Pemeriksaan::query()
            ->orderBy($this->sortField, $this->sortDirection)
            ->where('catatan', 'like', "%{$this->search}%");
    }

    public function render()
    {
        return view('livewire.dashboard.pemeriksaans.index', [
            'pemeriksaans' => $this->rows,
        ]);
    }
}
