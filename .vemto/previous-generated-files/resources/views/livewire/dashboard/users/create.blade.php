<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 space-y-4">
    <x-ui.breadcrumbs>
        <x-ui.breadcrumbs.link href="/dashboard"
            >Dashboard</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link href="{{ route('dashboard.users.index') }}"
            >{{ __('crud.users.collectionTitle') }}</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link active
            >Create {{ __('crud.users.itemTitle') }}</x-ui.breadcrumbs.link
        >
    </x-ui.breadcrumbs>

    <div class="w-full text-gray-500 text-lg font-semibold py-4 uppercase">
        <h1>Create {{ __('crud.users.itemTitle') }}</h1>
    </div>

    <div class="overflow-hidden border rounded-lg bg-white">
        <form class="w-full mb-0" wire:submit.prevent="save">
            <div class="p-6 space-y-3">
                <div class="w-full">
                    <x-ui.label for="name"
                        >{{ __('crud.users.inputs.name.label') }}</x-ui.label
                    >
                    <x-ui.input.text
                        class="w-full"
                        wire:model="form.name"
                        name="name"
                        id="name"
                        placeholder="{{ __('crud.users.inputs.name.placeholder') }}"
                    />
                    <x-ui.input.error for="form.name" />
                </div>

                <div class="w-full">
                    <x-ui.label for="email"
                        >{{ __('crud.users.inputs.email.label') }}</x-ui.label
                    >
                    <x-ui.input.email
                        class="w-full"
                        wire:model="form.email"
                        name="email"
                        id="email"
                        placeholder="{{ __('crud.users.inputs.email.placeholder') }}"
                    />
                    <x-ui.input.error for="form.email" />
                </div>

                <div class="w-full">
                    <x-ui.label for="role"
                        >{{ __('crud.users.inputs.role.label') }}</x-ui.label
                    >
                    <x-ui.input.text
                        class="w-full"
                        wire:model="form.role"
                        name="role"
                        id="role"
                        placeholder="{{ __('crud.users.inputs.role.placeholder') }}"
                    />
                    <x-ui.input.error for="form.role" />
                </div>

                <div class="w-full">
                    <x-ui.label for="password"
                        >{{ __('crud.users.inputs.password.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.password
                        class="w-full"
                        wire:model="form.password"
                        name="password"
                        id="password"
                        placeholder="{{ __('crud.users.inputs.password.placeholder') }}"
                    />
                    <x-ui.input.error for="form.password" />
                </div>

                <div class="w-full">
                    <x-ui.label for="tandaTangan"
                        >{{ __('crud.users.inputs.tandaTangan.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.textarea
                        class="w-full"
                        wire:model="form.tandaTangan"
                        rows="6"
                        name="tandaTangan"
                        id="tandaTangan"
                        placeholder="{{ __('crud.users.inputs.tandaTangan.placeholder') }}"
                    />
                    <x-ui.input.error for="form.tandaTangan" />
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
