<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 space-y-4">
    <x-ui.breadcrumbs>
        <x-ui.breadcrumbs.link href="/dashboard"
            >Dashboard</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link
            href="{{ route('dashboard.pemeriksaans.index') }}"
            >{{ __('crud.pemeriksaans.collectionTitle')
            }}</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link active
            >Create {{ __('crud.pemeriksaans.itemTitle')
            }}</x-ui.breadcrumbs.link
        >
    </x-ui.breadcrumbs>

    <div class="w-full text-gray-500 text-lg font-semibold py-4 uppercase">
        <h1>Create {{ __('crud.pemeriksaans.itemTitle') }}</h1>
    </div>

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
                    <x-ui.label for="user_id"
                        >{{ __('crud.pemeriksaans.inputs.user_id.label')
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
                    <x-ui.label for="pemeliharaan_id"
                        >{{ __('crud.pemeriksaans.inputs.pemeliharaan_id.label')
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
