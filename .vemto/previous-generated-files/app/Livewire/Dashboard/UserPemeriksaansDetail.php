<?php

namespace App\Livewire\Dashboard;

use Livewire\Form;
use App\Models\User;
use Livewire\Component;
use App\Models\Pemeriksaan;
use Livewire\WithPagination;
use App\Models\Pemeliharaan;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use App\Livewire\Dashboard\Pemeriksaans\Forms\CreateDetailForm;
use App\Livewire\Dashboard\Pemeriksaans\Forms\UpdateDetailForm;

class UserPemeriksaansDetail extends Component
{
    use WithFileUploads, WithPagination;

    public CreateDetailForm|UpdateDetailForm $form;

    public ?Pemeriksaan $pemeriksaan;
    public User $user;

    public Collection $pemeliharaans;

    public $showingModal = false;

    public $detailPemeriksaansSearch = '';
    public $detailPemeriksaansSortField = 'updated_at';
    public $detailPemeriksaansSortDirection = 'desc';

    public $queryString = [
        'detailPemeriksaansSearch',
        'detailPemeriksaansSortField',
        'detailPemeriksaansSortDirection',
    ];

    public $confirmingPemeriksaanDeletion = false;
    public string $deletingPemeriksaan;

    public function mount()
    {
        $this->form = new CreateDetailForm($this, 'form');

        $this->pemeliharaans = Pemeliharaan::pluck('periodePemeliharaan', 'id');
    }

    public function newPemeriksaan()
    {
        $this->form = new CreateDetailForm($this, 'form');
        $this->pemeriksaan = null;

        $this->showModal();
    }

    public function editPemeriksaan(Pemeriksaan $pemeriksaan)
    {
        $this->form = new UpdateDetailForm($this, 'form');
        $this->form->setPemeriksaan($pemeriksaan);
        $this->pemeriksaan = $pemeriksaan;

        $this->showModal();
    }

    public function showModal()
    {
        $this->showingModal = true;
    }

    public function closeModal()
    {
        $this->showingModal = false;
    }

    public function confirmPemeriksaanDeletion(string $id)
    {
        $this->deletingPemeriksaan = $id;

        $this->confirmingPemeriksaanDeletion = true;
    }

    public function deletePemeriksaan(Pemeriksaan $pemeriksaan)
    {
        $this->authorize('delete', $pemeriksaan);

        $pemeriksaan->delete();

        $this->confirmingPemeriksaanDeletion = false;
    }

    public function save()
    {
        if (empty($this->pemeriksaan)) {
            $this->authorize('create', Pemeriksaan::class);
        } else {
            $this->authorize('update', $this->pemeriksaan);
        }

        $this->form->user_id = $this->user->id;
        $this->form->save();

        $this->closeModal();
    }

    public function sortBy($field)
    {
        if ($this->detailPemeriksaansSortField === $field) {
            $this->detailPemeriksaansSortDirection =
                $this->detailPemeriksaansSortDirection === 'asc'
                    ? 'desc'
                    : 'asc';
        } else {
            $this->detailPemeriksaansSortDirection = 'asc';
        }

        $this->detailPemeriksaansSortField = $field;
    }

    public function getRowsProperty()
    {
        return $this->rowsQuery->paginate(5);
    }

    public function getRowsQueryProperty()
    {
        return $this->user
            ->pemeriksaans()
            ->orderBy(
                $this->detailPemeriksaansSortField,
                $this->detailPemeriksaansSortDirection
            )
            ->where('catatan', 'like', "%{$this->detailPemeriksaansSearch}%");
    }

    public function render()
    {
        return view('livewire.dashboard.users.pemeriksaans-detail', [
            'detailPemeriksaans' => $this->rows,
        ]);
    }
}
