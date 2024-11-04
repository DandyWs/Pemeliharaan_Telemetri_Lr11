<div>
    <div class="flex justify-between align-top py-4">
        <x-ui.input
            wire:model.live="detailPemeriksaansSearch"
            type="text"
            placeholder="Search {{ __('crud.pemeriksaans.collectionTitle') }}..."
        />

        @can('create', App\Models\Pemeriksaan::class)
        <a wire:click="newPemeriksaan()">
            <x-ui.button>New</x-ui.button>
        </a>
        @endcan
    </div>

    {{-- Modal --}}
    <x-ui.modal wire:model="showingModal">
        <div class="overflow-hidden border rounded-lg bg-white">
            <form class="w-full mb-0" wire:submit.prevent="save">
                <div class="p-6 space-y-3">
                    <div class="w-full">
                        <x-ui.input.checkbox
                            class=""
                            wire:model="form.hasilPemeriksaan"
                            name="hasilPemeriksaan"
                            id="hasilPemeriksaan"
                        />
                        <x-ui.label for="hasilPemeriksaan"
                            >{{
                            __('crud.pemeriksaans.inputs.hasilPemeriksaan.label')
                            }}</x-ui.label
                        >
                        <x-ui.input.error for="form.hasilPemeriksaan" />
                    </div>

                    <div class="w-full">
                        <x-ui.label for="catatan"
                            >{{ __('crud.pemeriksaans.inputs.catatan.label')
                            }}</x-ui.label
                        >
                        <x-ui.input.text
                            class="w-full"
                            wire:model="form.catatan"
                            name="catatan"
                            id="catatan"
                            placeholder="{{ __('crud.pemeriksaans.inputs.catatan.placeholder') }}"
                        />
                        <x-ui.input.error for="form.catatan" />
                    </div>

                    <div class="w-full">
                        <x-ui.label for="pemeliharaan_id"
                            >{{
                            __('crud.pemeriksaans.inputs.pemeliharaan_id.label')
                            }}</x-ui.label
                        >
                        <x-ui.input.select
                            wire:model="form.pemeliharaan_id"
                            name="pemeliharaan_id"
                            id="pemeliharaan_id"
                            class="w-full"
                        >
                            <option value="">Select data</option>
                            @foreach ($pemeliharaans as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                            @endforeach
                        </x-ui.input.select>
                        <x-ui.input.error for="form.pemeliharaan_id" />
                    </div>
                </div>

                <div
                    class="flex justify-between mt-4 border-t border-gray-50 bg-gray-50 p-4"
                >
                    <div>
                        <!-- Other buttons here -->
                    </div>
                    <div>
                        <x-ui.button type="submit">Save</x-ui.button>
                    </div>
                </div>
            </form>
        </div>
    </x-ui.modal>

    {{-- Delete Modal --}}
    <x-ui.modal.confirm wire:model="confirmingPemeriksaanDeletion">
        <x-slot name="title"> {{ __('Delete') }} </x-slot>

        <x-slot name="content"> {{ __('Are you sure?') }} </x-slot>

        <x-slot name="footer">
            <x-ui.button
                wire:click="$toggle('confirmingPemeriksaanDeletion')"
                wire:loading.attr="disabled"
            >
                {{ __('Cancel') }}
            </x-ui.button>

            <x-ui.button.danger
                class="ml-3"
                wire:click="deletePemeriksaan({{ $deletingPemeriksaan }})"
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
                    for-detailCrud
                    wire:click="sortBy('hasilPemeriksaan')"
                    >{{ __('crud.pemeriksaans.inputs.hasilPemeriksaan.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-detailCrud wire:click="sortBy('catatan')"
                    >{{ __('crud.pemeriksaans.inputs.catatan.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header
                    for-detailCrud
                    wire:click="sortBy('pemeliharaan_id')"
                    >{{ __('crud.pemeriksaans.inputs.pemeliharaan_id.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.action-header>Actions</x-ui.table.action-header>
            </x-slot>

            <x-slot name="body">
                @forelse ($detailPemeriksaans as $pemeriksaan)
                <x-ui.table.row wire:loading.class.delay="opacity-75">
                    <x-ui.table.column for-detailCrud
                        >{{ $pemeriksaan->hasilPemeriksaan }}</x-ui.table.column
                    >
                    <x-ui.table.column for-detailCrud
                        >{{ $pemeriksaan->catatan }}</x-ui.table.column
                    >
                    <x-ui.table.column for-detailCrud
                        >{{ $pemeriksaan->pemeliharaan_id }}</x-ui.table.column
                    >
                    <x-ui.table.action-column>
                        @can('update', $pemeriksaan)
                        <x-ui.action
                            wire:click="editPemeriksaan({{ $pemeriksaan->id }})"
                            >Edit</x-ui.action
                        >
                        @endcan @can('delete', $pemeriksaan)
                        <x-ui.action.danger
                            wire:click="confirmPemeriksaanDeletion({{ $pemeriksaan->id }})"
                            >Delete</x-ui.action.danger
                        >
                        @endcan
                    </x-ui.table.action-column>
                </x-ui.table.row>
                @empty
                <x-ui.table.row>
                    <x-ui.table.column colspan="4"
                        >No {{ __('crud.pemeriksaans.collectionTitle') }} found.</x-ui.table.column
                    >
                </x-ui.table.row>
                @endforelse
            </x-slot>
        </x-ui.table>

        <div class="mt-2">{{ $detailPemeriksaans->links() }}</div>
    </x-ui.container.table>
</div>
