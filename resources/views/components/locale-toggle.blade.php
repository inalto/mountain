<div x-data="{ dropdownOpen: false }" class="relative my-32 w-32">
    <button x-on:click="dropdownOpen = !dropdownOpen"
        class="relative z-10 block rounded-md bg-white dark:bg-black p-2 focus:outline-none">
        {{ App::currentLocale() }}
        <svg class="h-5 w-5 text-gray-800 dark:text-gray-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
            fill="currentColor">
            <path fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd" />
        </svg>
    </button>


    <div x-show="dropdownOpen" class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
        @foreach(config('translatable')['locales'] as $locale)
        <a href="#" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">
            {{$locale }}
        </a>
        @endforeach
        
    </div>
</div>
