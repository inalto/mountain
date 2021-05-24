<div class="flex flex-col items-center w-2/3 min-h-screen pt-6 mx-auto sm:justify-center sm:pt-0">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full px-6 py-4 mt-6 overflow-hidden bg-white shadow-md dark:bg-gray-700 sm:max-w-md sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
