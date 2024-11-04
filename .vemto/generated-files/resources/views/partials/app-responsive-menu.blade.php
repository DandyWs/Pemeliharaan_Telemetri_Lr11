@can('view-any', App\Models\User::class)
<x-responsive-nav-link
    href="{{ route('dashboard.users.index') }}"
    :active="request()->routeIs('dashboard.users.index')"
>
    {{ __('navigation.users') }}
</x-responsive-nav-link>
@endcan @can('view-any', App\Models\Pemeliharaan::class)
<x-responsive-nav-link
    href="{{ route('dashboard.pemeliharaans.index') }}"
    :active="request()->routeIs('dashboard.pemeliharaans.index')"
>
    {{ __('navigation.pemeliharaans') }}
</x-responsive-nav-link>
@endcan @can('view-any', App\Models\Pemeriksaan::class)
<x-responsive-nav-link
    href="{{ route('dashboard.pemeriksaans.index') }}"
    :active="request()->routeIs('dashboard.pemeriksaans.index')"
>
    {{ __('navigation.pemeriksaans') }}
</x-responsive-nav-link>
@endcan
