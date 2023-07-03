@props(['categories'=>[], 'category'=>''])
<div {{$attributes}}
    class="fixed md:relative  top-0 left-0 w-[160px] bg-white dark:bg-gray-900 z-10 transition mr-[20px]"
    x-bind:class="isOpen? '':'-translate-x-full'"
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="transform opacity-0 scale-95"
    x-transition:enter-end="transform opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-75"
    x-transition:leave-start="transform opacity-100 scale-100"
    x-transition:leave-end="transform opacity-0 scale-95"
    >
    <div class="fixed w-[160px] px-2 left-0 bg-white dark:bg-gray-900 pt-20 flex flex-col justify-items-center shadow-lg overflow-hidden overflow-y-scroll min-h-screen">
        <x-inalto.nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
            {{ __('Home') }}
        </x-inalto.nav-link>
        
        @if ($categories)
            @foreach($categories as $cat)
            <x-inalto.nav-link href="{{ route('reports', $cat->slug) }}" :active="$cat->slug==$category?true:false">
                {{ $cat->name }}
            </x-inalto.nav-link>
            @endforeach
        @endif
        <x-inalto.nav-link href="{{ route('pois') }}" :active="request()->routeIs('pois')">
            {{ __('Punti di interesse') }}
        </x-inalto.nav-link>
        <x-inalto.nav-link href="{{ route('have-been-there') }}" :active="request()->routeIs('have-been-there')">
            {{ __('Ci sono stato') }}
        </x-inalto.nav-link>
        @auth
        <x-inalto.nav-link href="{{ route('admin.home') }}" :active="request()->routeIs('admin')">
            {{ __('Admin') }}
        </x-inalto.nav-link>
        @endauth

    </div>

</div>