<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 space-y-4">
    <x-ui.breadcrumbs>
        <x-ui.breadcrumbs.link href="/dashboard"
            >Dashboard</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link
            href="{{ route('dashboard.pemeliharaans.index') }}"
            >{{ __('crud.pemeliharaans.collectionTitle')
            }}</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link active
            >Create {{ __('crud.pemeliharaans.itemTitle')
            }}</x-ui.breadcrumbs.link
        >
    </x-ui.breadcrumbs>

    <div class="w-full text-gray-500 text-lg font-semibold py-4 uppercase">
        <h1>Create {{ __('crud.pemeliharaans.itemTitle') }}</h1>
    </div>

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
                        >{{ __('crud.pemeliharaans.inputs.no_alatUkur.label')
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
                    <x-ui.label for="user_id"
                        >{{ __('crud.pemeliharaans.inputs.user_id.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.select
                        wire:model="form.user_id"
                        name="user_id"
                        id="user_id"
                        class="w-full"
                    >
                        <option value="">Select data</option>
                        @foreach ($users as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </x-ui.input.select>
                    <x-ui.input.error for="form.user_id" />
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

            <div class="flex justify-between mt-4 border-t border-gray-50 p-4">
                <div>
                    <!-- Other buttons here -->
                </div>
                <div>
                    <x-ui.button type="submit">Save</x-ui.button>
                </div>
            </div>
        </form>
    </div>
</div>
