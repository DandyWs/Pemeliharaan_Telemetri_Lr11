<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pemeliharaan;

class PemeliharaanIndex extends Component
{
    use WithPagination;

    public $search;
    public $sortField = 'updated_at';
    public $sortDirection = 'desc';

    public $queryString = ['search', 'sortField', 'sortDirection'];

    public $confirmingDeletion = false;
    public $deletingPemeliharaan;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDeletion(string $id)
    {
        $this->deletingPemeliharaan = $id;

        $this->confirmingDeletion = true;
    }

    public function delete(Pemeliharaan $pemeliharaan)
    {
        $pemeliharaan->delete();

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
        return Pemeliharaan::query()
            ->orderBy($this->sortField, $this->sortDirection)
            ->where('periodePemeliharaan', 'like', "%{$this->search}%");
    }

    public function render()
    {
        return view('livewire.dashboard.pemeliharaans.index', [
            'pemeliharaans' => $this->rows,
        ]);
    }
}
