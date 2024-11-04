<?php

namespace App\Livewire\Dashboard;

use Livewire\Form;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pemeliharaan;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use App\Livewire\Dashboard\Pemeliharaans\Forms\CreateDetailForm;
use App\Livewire\Dashboard\Pemeliharaans\Forms\UpdateDetailForm;

class UserPemeliharaansDetail extends Component
{
    use WithFileUploads, WithPagination;

    public CreateDetailForm|UpdateDetailForm $form;

    public ?Pemeliharaan $pemeliharaan;
    public User $user;

    public $showingModal = false;

    public $detailPemeliharaansSearch = '';
    public $detailPemeliharaansSortField = 'updated_at';
    public $detailPemeliharaansSortDirection = 'desc';

    public $queryString = [
        'detailPemeliharaansSearch',
        'detailPemeliharaansSortField',
        'detailPemeliharaansSortDirection',
    ];

    public $confirmingPemeliharaanDeletion = false;
    public string $deletingPemeliharaan;

    public function mount()
    {
        $this->form = new CreateDetailForm($this, 'form');
    }

    public function newPemeliharaan()
    {
        $this->form = new CreateDetailForm($this, 'form');
        $this->pemeliharaan = null;

        $this->showModal();
    }

    public function editPemeliharaan(Pemeliharaan $pemeliharaan)
    {
        $this->form = new UpdateDetailForm($this, 'form');
        $this->form->setPemeliharaan($pemeliharaan);
        $this->pemeliharaan = $pemeliharaan;

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

    public function confirmPemeliharaanDeletion(string $id)
    {
        $this->deletingPemeliharaan = $id;

        $this->confirmingPemeliharaanDeletion = true;
    }

    public function deletePemeliharaan(Pemeliharaan $pemeliharaan)
    {
        $this->authorize('delete', $pemeliharaan);

        $pemeliharaan->delete();

        $this->confirmingPemeliharaanDeletion = false;
    }

    public function save()
    {
        if (empty($this->pemeliharaan)) {
            $this->authorize('create', Pemeliharaan::class);
        } else {
            $this->authorize('update', $this->pemeliharaan);
        }

        $this->form->user_id = $this->user->id;
        $this->form->save();

        $this->closeModal();
    }

    public function sortBy($field)
    {
        if ($this->detailPemeliharaansSortField === $field) {
            $this->detailPemeliharaansSortDirection =
                $this->detailPemeliharaansSortDirection === 'asc'
                    ? 'desc'
                    : 'asc';
        } else {
            $this->detailPemeliharaansSortDirection = 'asc';
        }

        $this->detailPemeliharaansSortField = $field;
    }

    public function getRowsProperty()
    {
        return $this->rowsQuery->paginate(5);
    }

    public function getRowsQueryProperty()
    {
        return $this->user
            ->pemeliharaans()
            ->orderBy(
                $this->detailPemeliharaansSortField,
                $this->detailPemeliharaansSortDirection
            )
            ->where(
                'periodePemeliharaan',
                'like',
                "%{$this->detailPemeliharaansSearch}%"
            );
    }

    public function render()
    {
        return view('livewire.dashboard.users.pemeliharaans-detail', [
            'detailPemeliharaans' => $this->rows,
        ]);
    }
}
