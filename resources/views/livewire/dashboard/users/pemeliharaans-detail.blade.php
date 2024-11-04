<div>
    <div class="flex justify-between align-top py-4">
        <x-ui.input
            wire:model.live="detailPemeliharaansSearch"
            type="text"
            placeholder="Search {{ __('crud.pemeliharaans.collectionTitle') }}..."
        />

        @can('create', App\Models\Pemeliharaan::class)
        <a wire:click="newPemeliharaan()">
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
                        <x-ui.label for="tanggalPemeliharaan"
                            >{{
                            __('crud.pemeliharaans.inputs.tanggalPemeliharaan.label')
                            }}</x-ui.label
                        >
                        <x-ui.input.date-time
                            class="w-full"
                            wire:model="form.tanggalPemeliharaan"
                            name="tanggalPemeliharaan"
                            id="tanggalPemeliharaan"
                        />
                        <x-ui.input.error for="form.tanggalPemeliharaan" />
                    </div>

                    <div class="w-full">
                        <x-ui.label for="waktuMulaiPemeliharaan"
                            >{{
                            __('crud.pemeliharaans.inputs.waktuMulaiPemeliharaan.label')
                            }}</x-ui.label
                        >
                        <x-ui.input.date-time
                            class="w-full"
                            wire:model="form.waktuMulaiPemeliharaan"
                            name="waktuMulaiPemeliharaan"
                            id="waktuMulaiPemeliharaan"
                        />
                        <x-ui.input.error for="form.waktuMulaiPemeliharaan" />
                    </div>

                    <div class="w-full">
                        <x-ui.label for="periodePemeliharaan"
                            >{{
                            __('crud.pemeliharaans.inputs.periodePemeliharaan.label')
                            }}</x-ui.label
                        >
                        <x-ui.input.text
                            class="w-full"
                            wire:model="form.periodePemeliharaan"
                            name="periodePemeliharaan"
                            id="periodePemeliharaan"
                            placeholder="{{ __('crud.pemeliharaans.inputs.periodePemeliharaan.placeholder') }}"
                        />
                        <x-ui.input.error for="form.periodePemeliharaan" />
                    </div>

                    <div class="w-full">
                        <x-ui.label for="cuaca"
                            >{{ __('crud.pemeliharaans.inputs.cuaca.label')
                            }}</x-ui.label
                        >
                        <x-ui.input.text
                            class="w-full"
                            wire:model="form.cuaca"
                            name="cuaca"
                            id="cuaca"
                            placeholder="{{ __('crud.pemeliharaans.inputs.cuaca.placeholder') }}"
                        />
                        <x-ui.input.error for="form.cuaca" />
                    </div>

                    <div class="w-full">
                        <x-ui.label for="no_alatUkur"
                            >{{
                            __('crud.pemeliharaans.inputs.no_alatUkur.label')
                            }}</x-ui.label
                        >
                        <x-ui.input.number
                            class="w-full"
                            wire:model="form.no_alatUkur"
                            name="no_alatUkur"
                            id="no_alatUkur"
                            placeholder="{{ __('crud.pemeliharaans.inputs.no_alatUkur.placeholder') }}"
                            step="1"
                        />
                        <x-ui.input.error for="form.no_alatUkur" />
                    </div>

                    <div class="w-full">
                        <x-ui.label for="no_GSM"
                            >{{ __('crud.pemeliharaans.inputs.no_GSM.label')
                            }}</x-ui.label
                        >
                        <x-ui.input.number
                            class="w-full"
                            wire:model="form.no_GSM"
                            name="no_GSM"
                            id="no_GSM"
                            placeholder="{{ __('crud.pemeliharaans.inputs.no_GSM.placeholder') }}"
                            step="1"
                        />
                        <x-ui.input.error for="form.no_GSM" />
                    </div>

                    <div class="w-full">
                        <x-ui.label for="alat_telemetri_id"
                            >{{
                            __('crud.pemeliharaans.inputs.alat_telemetri_id.label')
                            }}</x-ui.label
                        >
                        <x-ui.input.number
                            class="w-full"
                            wire:model="form.alat_telemetri_id"
                            name="alat_telemetri_id"
                            id="alat_telemetri_id"
                            placeholder="{{ __('crud.pemeliharaans.inputs.alat_telemetri_id.placeholder') }}"
                            step="1"
                        />
                        <x-ui.input.error for="form.alat_telemetri_id" />
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
    <x-ui.modal.confirm wire:model="confirmingPemeliharaanDeletion">
        <x-slot name="title"> {{ __('Delete') }} </x-slot>

        <x-slot name="content"> {{ __('Are you sure?') }} </x-slot>

        <x-slot name="footer">
            <x-ui.button
                wire:click="$toggle('confirmingPemeliharaanDeletion')"
                wire:loading.attr="disabled"
            >
                {{ __('Cancel') }}
            </x-ui.button>

            <x-ui.button.danger
                class="ml-3"
                wire:click="deletePemeliharaan({{ $deletingPemeliharaan }})"
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
                    wire:click="sortBy('tanggalPemeliharaan')"
                    >{{
                    __('crud.pemeliharaans.inputs.tanggalPemeliharaan.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header
                    for-detailCrud
                    wire:click="sortBy('waktuMulaiPemeliharaan')"
                    >{{
                    __('crud.pemeliharaans.inputs.waktuMulaiPemeliharaan.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header
                    for-detailCrud
                    wire:click="sortBy('periodePemeliharaan')"
                    >{{
                    __('crud.pemeliharaans.inputs.periodePemeliharaan.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-detailCrud wire:click="sortBy('cuaca')"
                    >{{ __('crud.pemeliharaans.inputs.cuaca.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header
                    for-detailCrud
                    wire:click="sortBy('no_alatUkur')"
                    >{{ __('crud.pemeliharaans.inputs.no_alatUkur.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-detailCrud wire:click="sortBy('no_GSM')"
                    >{{ __('crud.pemeliharaans.inputs.no_GSM.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header
                    for-detailCrud
                    wire:click="sortBy('alat_telemetri_id')"
                    >{{ __('crud.pemeliharaans.inputs.alat_telemetri_id.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.action-header>Actions</x-ui.table.action-header>
            </x-slot>

            <x-slot name="body">
                @forelse ($detailPemeliharaans as $pemeliharaan)
                <x-ui.table.row wire:loading.class.delay="opacity-75">
                    <x-ui.table.column for-detailCrud
                        >{{ $pemeliharaan->tanggalPemeliharaan
                        }}</x-ui.table.column
                    >
                    <x-ui.table.column for-detailCrud
                        >{{ $pemeliharaan->waktuMulaiPemeliharaan
                        }}</x-ui.table.column
                    >
                    <x-ui.table.column for-detailCrud
                        >{{ $pemeliharaan->periodePemeliharaan
                        }}</x-ui.table.column
                    >
                    <x-ui.table.column for-detailCrud
                        >{{ $pemeliharaan->cuaca }}</x-ui.table.column
                    >
                    <x-ui.table.column for-detailCrud
                        >{{ $pemeliharaan->no_alatUkur }}</x-ui.table.column
                    >
                    <x-ui.table.column for-detailCrud
                        >{{ $pemeliharaan->no_GSM }}</x-ui.table.column
                    >
                    <x-ui.table.column for-detailCrud
                        >{{ $pemeliharaan->alat_telemetri_id
                        }}</x-ui.table.column
                    >
                    <x-ui.table.action-column>
                        @can('update', $pemeliharaan)
                        <x-ui.action
                            wire:click="editPemeliharaan({{ $pemeliharaan->id }})"
                            >Edit</x-ui.action
                        >
                        @endcan @can('delete', $pemeliharaan)
                        <x-ui.action.danger
                            wire:click="confirmPemeliharaanDeletion({{ $pemeliharaan->id }})"
                            >Delete</x-ui.action.danger
                        >
                        @endcan
                    </x-ui.table.action-column>
                </x-ui.table.row>
                @empty
                <x-ui.table.row>
                    <x-ui.table.column colspan="8"
                        >No {{ __('crud.pemeliharaans.collectionTitle') }} found.</x-ui.table.column
                    >
                </x-ui.table.row>
                @endforelse
            </x-slot>
        </x-ui.table>

        <div class="mt-2">{{ $detailPemeliharaans->links() }}</div>
    </x-ui.container.table>
</div>
