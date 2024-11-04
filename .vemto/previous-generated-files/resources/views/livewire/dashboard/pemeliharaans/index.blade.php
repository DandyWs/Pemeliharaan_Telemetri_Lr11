<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 space-y-4">
    <x-ui.breadcrumbs>
        <x-ui.breadcrumbs.link href="/dashboard"
            >Dashboard</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link active
            >{{ __('crud.pemeliharaans.collectionTitle')
            }}</x-ui.breadcrumbs.link
        >
    </x-ui.breadcrumbs>

    <div class="flex justify-between align-top py-4">
        <x-ui.input
            wire:model.live="search"
            type="text"
            placeholder="Search {{ __('crud.pemeliharaans.collectionTitle') }}..."
        />

        @can('create', App\Models\Pemeliharaan::class)
        <a wire:navigate href="{{ route('dashboard.pemeliharaans.create') }}">
            <x-ui.button>New</x-ui.button>
        </a>
        @endcan
    </div>

    {{-- Delete Modal --}}
    <x-ui.modal.confirm wire:model="confirmingDeletion">
        <x-slot name="title"> {{ __('Delete') }} </x-slot>

        <x-slot name="content"> {{ __('Are you sure?') }} </x-slot>

        <x-slot name="footer">
            <x-ui.button
                wire:click="$toggle('confirmingDeletion')"
                wire:loading.attr="disabled"
            >
                {{ __('Cancel') }}
            </x-ui.button>

            <x-ui.button.danger
                class="ml-3"
                wire:click="delete({{ $deletingPemeliharaan }})"
                wire:loading.attr="disabled"
            >
                {{ __('Delete') }}
            </x-ui.button.danger>
        </x-slot>
    </x-ui.modal.confirm>

    {{-- Index Table --}}
    <x-ui.container.table>
        <x-ui.table>
            <x-slot name="head">
                <x-ui.table.header
                    for-crud
                    wire:click="sortBy('tanggalPemeliharaan')"
                    >{{
                    __('crud.pemeliharaans.inputs.tanggalPemeliharaan.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header
                    for-crud
                    wire:click="sortBy('waktuMulaiPemeliharaan')"
                    >{{
                    __('crud.pemeliharaans.inputs.waktuMulaiPemeliharaan.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header
                    for-crud
                    wire:click="sortBy('periodePemeliharaan')"
                    >{{
                    __('crud.pemeliharaans.inputs.periodePemeliharaan.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('cuaca')"
                    >{{ __('crud.pemeliharaans.inputs.cuaca.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('no_alatUkur')"
                    >{{ __('crud.pemeliharaans.inputs.no_alatUkur.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('no_GSM')"
                    >{{ __('crud.pemeliharaans.inputs.no_GSM.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('user_id')"
                    >{{ __('crud.pemeliharaans.inputs.user_id.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header
                    for-crud
                    wire:click="sortBy('alat_telemetri_id')"
                    >{{ __('crud.pemeliharaans.inputs.alat_telemetri_id.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.action-header>Actions</x-ui.table.action-header>
            </x-slot>

            <x-slot name="body">
                @forelse ($pemeliharaans as $pemeliharaan)
                <x-ui.table.row wire:loading.class.delay="opacity-75">
                    <x-ui.table.column for-crud
                        >{{ $pemeliharaan->tanggalPemeliharaan
                        }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $pemeliharaan->waktuMulaiPemeliharaan
                        }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $pemeliharaan->periodePemeliharaan
                        }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $pemeliharaan->cuaca }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $pemeliharaan->no_alatUkur }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $pemeliharaan->no_GSM }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $pemeliharaan->user_id }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $pemeliharaan->alat_telemetri_id
                        }}</x-ui.table.column
                    >
                    <x-ui.table.action-column>
                        @can('update', $pemeliharaan)
                        <x-ui.action
                            wire:navigate
                            href="{{ route('dashboard.pemeliharaans.edit', $pemeliharaan) }}"
                            >Edit</x-ui.action
                        >
                        @endcan @can('delete', $pemeliharaan)
                        <x-ui.action.danger
                            wire:click="confirmDeletion({{ $pemeliharaan->id }})"
                            >Delete</x-ui.action.danger
                        >
                        @endcan
                    </x-ui.table.action-column>
                </x-ui.table.row>
                @empty
                <x-ui.table.row>
                    <x-ui.table.column colspan="9"
                        >No {{ __('crud.pemeliharaans.collectionTitle') }} found.</x-ui.table.column
                    >
                </x-ui.table.row>
                @endforelse
            </x-slot>
        </x-ui.table>

        <div class="mt-2">{{ $pemeliharaans->links() }}</div>
    </x-ui.container.table>
</div>
