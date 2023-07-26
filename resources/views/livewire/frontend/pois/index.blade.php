
        <div class="flex flex-wrap">
            @forelse ($pois as $poi)
            <div class="w-full p-1 md:w-1/2 lg:w-1/3 xl:w-1/4 border-red ">
                <div class="flex flex-col h-full overflow-hidden bg-gray-50 dark:bg-gray-850 rounded-lg shadow-lg">
                    <div class="flex-grow-0">

                        @if ($poi->getFirstMediaUrl('poi_photos'))
                        <a class="block border-b-4 transition duration-500 border-white dark:border-black focus:outline-none hover:border-inalto-400 hover:dark:border-inalto-700 focus:border-inalto-400 dark:focus:border-inalto-700" href="{{ route('poi.show', $poi->slug) }}">
                            <img class="object-cover object-center w-full h-48" src="{{ $poi->getFirstMediaUrl('poi_photos') }}" alt="" /></a>
                        @else
                        <a class="block border-b-4 transition duration-500 border-white dark:border-black focus:outline-none hover:border-inalto-400 hover:dark:border-inalto-700 focus:border-inalto-400 dark:focus:border-inalto-700" href="{{ route('poi.show', $poi->slug) }}">
                            <svg class="h-48 mx-auto py-4 opacity-30 dark:text-gray-300" fill="currentColor" width="100%" height="100%" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;">
                                <rect id="inalto" x="0" y="0" width="1024" height="1024" style="fill:none;" />
                                <path d="M432.257,407.823c127.891,-291.318 540.37,-154.79 32.982,336.993c174.783,-321.208 93.545,-437.904 -32.982,-336.993Z" fill="currentColor" style="fill-opacity:0.8;" />
                                <path d="M163.925,829.699c153.836,96.285 156.422,26.866 399.525,-157.663c-141.542,249.252 -332.756,510.626 -399.525,157.663Z" fill="currentColor" style="fill-opacity:0.5;" />
                                <path d="M608.47,897.098c-206.102,232.516 -513.264,46.942 -106.682,-230.798c-155.883,210.534 -67.464,274.013 106.682,230.798Z" fill="currentColor" />
                                <circle cx="744.873" cy="95.207" r="83.173" fill="currentColor" style="fill-opacity:0.8;" />
                            </svg>
                        </a>
                        @endif

                    </div>
                    <div class="flex flex-col flex-grow p-3 bg-white dark:bg-gray-800">
                        <x-avatar :user="$poi->owner" show="true"></x-avatar>
                        <h2 class="flex-grow-0  mb-3 text-lg font-medium text-gray-900 dark:text-gray-100 title-font font-bold" title="{{$poi->nid}}" data-no-index>
                            {{ $poi->name }}
                        </h2>
                        <div class="flex-grow leading-relaxed mb-4 text-sm text-gray-800 dark:text-gray-300" data-no-index>
                            {{Str::of(strip_tags($poi->content))->words(20,'...') }}
                        </div>
                        <div class="flex justify-between flex-grow-0">
                            <div>
                              @if ($poi->height)
                                <span class="inline-flex items-center text-sm leading-none text-gray-600 dark:text-gray-300">
<svg  class="inline-block w-6 h-6 mr-1 fill-current text-gray-600 dark:text-gray-200" fill="currentColor" viewBox="0 0 300 300" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><g><g id="drop_p"><g><path d="M181.785,233.445c3.987,1.653 8.535,1.206 12.124,-1.191c3.588,-2.397 5.743,-6.427 5.743,-10.743c-0,-35.924 -0,-109.333 -0,-109.333l42.043,-0c3.6,-0 6.788,-2.304 7.915,-5.717c1.126,-3.412 -0.06,-7.163 -2.943,-9.306l-90.285,-67.034c-2.949,-2.189 -6.986,-2.189 -9.936,-0l-90.284,67.034c-2.89,2.143 -4.077,5.894 -2.95,9.306c1.134,3.413 4.322,5.717 7.914,5.717l42.044,-0l-0,80.045c-0,5.224 3.146,9.933 7.971,11.934c15.394,6.382 49.55,20.543 70.644,29.288Zm1.414,-129.601l0,95.798c0,2.674 -1.331,5.172 -3.551,6.663c-2.219,1.49 -5.036,1.778 -7.511,0.767c-13.962,-5.706 -37.383,-15.276 -47.575,-19.441c-3.018,-1.233 -4.99,-4.17 -4.99,-7.43c-0,-18.217 -0,-76.357 -0,-76.357c-0,-4.601 -3.464,-8.331 -8.064,-8.331l-25.181,-0l65.084,-48.322l65.083,48.322l-25.174,-0c-4.6,-0 -8.121,3.73 -8.121,8.331Z"/></g><g><path d="M48.704,25.453l205.418,0c4.599,0 8.333,-3.734 8.333,-8.334c-0,-4.599 -3.734,-8.333 -8.333,-8.333l-205.418,0c-4.599,0 -8.333,3.734 -8.333,8.333c-0,4.6 3.734,8.334 8.333,8.334Z"/></g></g><path d="M61.758,250.877c-3.456,2.879 -8.599,2.412 -11.478,-1.043c-2.88,-3.456 -2.412,-8.599 1.043,-11.479c0,0 26.57,-21.84 53.045,-22.575c13.028,-0.362 30.673,8.275 48.542,17.458c15.185,7.804 30.563,16.064 43.018,15.91c24.819,-0.306 52.298,-21.08 52.298,-21.08c3.608,-2.686 8.718,-1.937 11.403,1.671c2.686,3.608 1.938,8.717 -1.67,11.403c-0,0 -32.588,23.943 -61.829,24.304c-14.576,0.18 -32.9,-8.578 -50.67,-17.711c-15.086,-7.753 -29.64,-15.967 -40.64,-15.662c-21.579,0.6 -43.062,18.804 -43.062,18.804Z"/><path d="M61.758,280.877c-3.456,2.879 -8.599,2.412 -11.478,-1.043c-2.88,-3.456 -2.412,-8.599 1.043,-11.479c0,0 26.57,-21.84 53.045,-22.575c13.028,-0.362 30.673,8.275 48.542,17.458c15.185,7.804 30.563,16.064 43.018,15.91c24.819,-0.306 52.298,-21.08 52.298,-21.08c3.608,-2.686 8.718,-1.937 11.403,1.671c2.686,3.608 1.938,8.717 -1.67,11.403c-0,0 -32.588,23.943 -61.829,24.304c-14.576,0.18 -32.9,-8.578 -50.67,-17.711c-15.086,-7.753 -29.64,-15.967 -40.64,-15.662c-21.579,0.6 -43.062,18.804 -43.062,18.804Z"/></g></svg>

                                    {{ $poi->height  }} m
                                </span>
                              @endif
                            </div>
                            <div>
                                <a href="{{ route('poi.show', $poi->slug) }}" tabindex="-1" class="py-2 px-3 border text-gray-600 hover:bg-gray-50 dark:text-gray-300 text-sm rounded-lg dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-900 inline-flex items-center dark:hover:text-inalto-500 hover:text-inalto-400 md:mb-2 lg:mb-0">{{ __('inalto.read')}}
                                    <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14"></path>
                                        <path d="M12 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <p>{{__('No point of interest')}}</p>
            @endforelse
            @if($pois->hasMorePages())
                <livewire:frontend.pois.load-more :category="$category" :tag="$tag" :user_id="$user_id" :page=$page :perPage=$perPage  key="page-$page" />
            @endif
        </div>
