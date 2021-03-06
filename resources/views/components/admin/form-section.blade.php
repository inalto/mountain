@props(['submit'])

<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-3 md:gap-6']) }}>

    <div class="mt-5 md:mt-0 md:col-span-6">
        <form wire:submit.prevent="{{ $submit }}">
            <div class="overflow-hidden shadow sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6 dark:bg-gray-800">
                    <div class="grid grid-cols-6 gap-6">
                        {{ $form }}
                    </div>
                </div>


                
                @if (isset($actions))
                    <div class="flex items-center justify-end px-4 py-3 text-right bg-gray-50 sm:px-6 dark:bg-gray-800 dark:bg-opacity-50">
                        {{ $actions }}
                    </div>
                @endif
            </div>
        </form>
    </div>
</div>
