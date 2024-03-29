
        <div class="flex flex-wrap">
            @forelse ($reports as $report)
            <div class="w-full p-1 md:w-1/2 lg:w-1/3 xl:w-1/4 ">
                <div class="flex flex-col h-full overflow-hidden bg-gray-50 dark:bg-gray-850 rounded-lg shadow-lg">
                    <div class="flex-grow-0">

                        @if ($report->getFirstMediaUrl('report_photos'))
                        <a class="block border-b-4 transition duration-500 border-white dark:border-black focus:outline-none hover:border-inalto-400 hover:dark:border-inalto-700 focus:border-inalto-400 dark:focus:border-inalto-700" href="{{ route('report.show', ($report->category?$report->category->translate()->slug:'none').'/'.$report->slug) }}">
                            <img class="object-cover object-center w-full h-48" src="{{ $report->getFirstMediaUrl('report_photos') }}" alt="" /></a>
                        @else
                        <a class="block border-b-4 transition duration-500 border-white dark:border-black focus:outline-none hover:border-inalto-400 hover:dark:border-inalto-700 focus:border-inalto-400 dark:focus:border-inalto-700" href="{{ route('report.show', ($report->category?$report->category->translate()->slug:'none').'/'.$report->slug) }}">
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
                        <x-avatar :user="$report->owner" show="true"></x-avatar>
                        <h2 class="flex-grow-0  mb-3 text-lg font-medium text-gray-900 dark:text-gray-100 title-font font-bold" title="{{$report->nid}}" data-noi-ndex>
                            {{ $report->title }}
                        </h2>
                        <div class="flex-grow leading-relaxed mb-4 text-sm text-gray-800 dark:text-gray-300" data-no-index>
                            {{Str::of(strip_tags($report->excerpt))->words(20,'...') }}
                        </div>
                        <div class="flex justify-between flex-grow-0">
                            <div>
                                <span class="inline-flex items-center py-1 pr-3 ml-auto mr-3 text-sm leading-none text-gray-600 dark:text-gray-300 border-r-2 border-gray-300 dark:border-gray-200 lg:ml-auto md:ml-0">
                                    <svg class="w-4 h-4 mr-1 fill-current text-gray-600 dark:text-gray-300" stroke="currentColor" viewBox="0 0 24 24" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;">
                                        <g transform="matrix(0.069632,0,0,0.0688971,0.750933,0.978575)">
                                            <g transform="matrix(1.56886,0,0,1.58559,-78.4078,-78.1253)">
                                                <g transform="matrix(1,0,0,1,4.70588,-7.84314)">
                                                    <path d="M130.276,48.543L132.165,48.661L133.937,48.898L135.591,49.37L137.244,49.961L138.78,50.669L140.315,51.496L141.614,52.559L142.913,53.74L143.976,54.921L145.039,56.339L145.866,57.756L146.693,59.409L147.638,62.717L147.874,64.488L147.992,66.378L147.874,68.268L147.638,70.039L146.693,73.346L145.866,75L145.039,76.417L143.976,77.835L142.913,79.016L141.614,80.197L140.315,81.26L138.78,82.087L137.244,82.795L135.591,83.386L137.244,83.622L138.425,83.858L139.606,84.213L140.669,84.685L141.732,85.276L142.795,85.984L143.74,86.811L144.685,87.756L145.512,88.701L146.22,89.764L146.811,90.709L147.165,91.181L147.52,91.89L154.016,105.591L165.591,101.929L162.165,88.11L162.047,87.874L162.047,86.693L162.165,86.457L162.165,86.102L162.283,85.866L162.283,85.748L162.402,85.63L162.402,85.276L162.52,85.157L162.52,85.039L162.756,84.803L162.874,84.567L163.11,84.331L163.228,84.094L163.701,83.622L163.937,83.504L164.173,83.268L164.882,82.913L165.236,82.795L165.472,82.677L165.827,82.559L167.008,82.559L167.244,82.677L167.598,82.677L167.835,82.795L167.953,82.795L168.071,82.913L168.425,82.913L168.661,83.031L168.898,83.268L169.134,83.386L169.37,83.622L169.606,83.74L169.724,83.976L169.961,84.213L170.079,84.449L170.315,84.685L170.669,85.394L170.787,85.748L170.906,85.984L175.039,102.52L175.276,102.756L175.984,103.228L176.457,103.819L177.047,104.409L177.402,105L177.756,105.709L178.228,107.126L178.346,107.835L178.346,108.661L178.228,109.37L178.11,110.197L177.638,111.614L177.402,112.205L195.827,186.378L195.827,186.732L195.945,186.969L195.945,187.913L195.827,188.15L195.827,188.504L195.709,188.74L195.709,188.976L195.591,189.094L195.591,189.331L195.354,189.803L195.118,190.039L195,190.276L194.764,190.512L194.528,190.63L194.291,190.866L194.055,190.984L193.819,191.22L192.874,191.693L192.52,191.811L192.283,191.929L191.693,191.929L191.339,192.047L191.102,191.929L190.512,191.929L190.157,191.811L189.685,191.575L189.331,191.457L189.094,191.339L188.858,191.102L188.622,190.984L188.504,190.748L188.031,190.276L187.913,190.039L187.677,189.803L187.205,188.858L187.087,188.504L169.488,117.52L152.244,123.071L151.535,123.189L150.709,123.307L149.173,123.307L148.465,123.189L147.638,122.953L146.929,122.717L145.512,122.008L145.394,121.89L142.323,146.575L162.874,149.409L163.819,149.646L164.646,149.882L165.591,150.354L166.417,150.827L167.244,151.417L167.598,151.654L168.425,152.362L169.134,153.071L169.724,153.78L170.906,155.433L171.378,156.26L171.732,157.205L171.969,158.15L172.087,159.094L172.087,160.039L171.732,193.465L171.732,194.409L171.26,196.299L170.906,197.126L170.433,198.071L169.843,198.898L169.252,199.606L167.835,201.024L167.126,201.614L166.181,202.087L165.354,202.559L164.409,202.913L163.583,203.15L162.638,203.386L161.693,203.386L159.803,203.15L158.858,202.913L157.913,202.441L157.087,202.087L155.433,200.906L154.016,199.488L152.835,197.835L152.48,197.008L152.008,196.063L151.772,195.118L151.535,193.228L151.89,168.425L131.102,165.472L130.63,165.591L129.685,165.709L131.811,189.685L131.811,191.575L131.575,192.52L131.575,192.638L131.339,193.583L122.244,225.591L122.008,226.535L121.063,228.189L120.354,229.016L119.764,229.724L117.283,231.496L116.457,231.969L115.512,232.323L114.567,232.559L113.504,232.795L112.559,232.913L111.614,232.913L110.669,232.795L108.78,232.323L107.126,231.378L106.417,230.787L105.709,230.079L105,229.252L104.409,228.425L103.465,226.772L103.11,225.827L102.756,224.764L102.52,223.819L102.402,222.874L102.402,221.929L102.52,220.984L102.756,220.039L111.496,189.094L108.898,159.685L108.543,159.331L107.835,158.268L107.244,157.205L106.654,156.024L106.299,154.961L105.945,153.661L105.709,152.48L105.709,150.118L108.071,131.22L100.984,118.228L100.748,117.638L100.512,116.811L100.276,116.102L100.276,113.74L100.394,112.913L100.63,112.087L100.866,111.378L101.575,109.961L102.047,109.252L102.402,108.78L112.913,91.535L113.386,90.945L113.622,90.591L113.858,89.882L114.449,88.819L115.157,87.874L115.984,86.929L116.929,85.984L117.874,85.157L118.937,84.449L121.063,83.268L122.244,82.795L122.953,82.677L121.772,82.087L120.236,81.26L118.937,80.197L117.638,79.016L116.575,77.835L115.512,76.417L114.685,75L113.858,73.346L112.913,70.039L112.677,68.268L112.559,66.378L112.677,64.488L112.913,62.717L113.858,59.409L114.685,57.756L115.512,56.339L116.575,54.921L117.638,53.74L118.937,52.559L120.236,51.496L121.772,50.669L123.307,49.961L124.961,49.37L126.614,48.898L128.386,48.661L130.276,48.543Z" />
                                                </g>
                                                <path d="M79.666,257.876L108.286,234.339C108.286,234.339 144.01,235.279 144.01,235.279C145.415,235.316 146.742,234.631 147.525,233.463L166.723,204.855C166.723,204.855 207.703,191.954 207.703,191.954C208.779,191.615 209.668,190.848 210.162,189.833L227.22,154.735C228.211,152.698 227.361,150.24 225.323,149.25C223.286,148.26 220.828,149.11 219.838,151.147L203.552,184.655C203.552,184.655 162.885,197.458 162.885,197.458C161.996,197.738 161.229,198.312 160.71,199.086L141.968,227.015C141.968,227.015 106.971,226.094 106.971,226.094C105.983,226.068 105.019,226.399 104.256,227.026L74.452,251.536C72.703,252.975 72.45,255.563 73.889,257.313C75.328,259.062 77.916,259.314 79.666,257.876Z" />
                                            </g>
                                        </g>
                                    </svg>
                                    {{ $report->difficulty }}

                                </span>
                                <span class="inline-flex items-center py-1 pr-3 ml-auto mr-3 text-sm leading-none text-gray-600 dark:text-gray-300 border-r-2 border-gray-300  dark:border-gray-300 lg:ml-auto md:ml-0">
                                    <svg class="inline-block w-6 h-6 mr-1 fill-current text-gray-600 dark:text-gray-200" stroke="currentColor" viewBox="0 0 752 752" version="1.1" xmlns="http://www.w3.org/2000/svg" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;">
                                        <g>
                                            <g>
                                                <path d="M21.767,430.907l169.703,169.703c9.263,9.263 24.305,9.263 33.569,-0c9.264,-9.264 9.264,-24.306 0,-33.57l-169.702,-169.703c-9.264,-9.263 -24.306,-9.263 -33.57,0c-9.264,9.264 -9.264,24.306 0,33.57Z" />
                                                <path d="M55.337,600.61l169.702,-169.703c9.264,-9.264 9.264,-24.306 0,-33.57c-9.264,-9.263 -24.306,-9.263 -33.569,0l-169.703,169.703c-9.264,9.264 -9.264,24.306 0,33.57c9.264,9.263 24.306,9.263 33.57,-0Z" />
                                            </g>
                                            <g>
                                                <path d="M532.255,188.08l169.702,169.703c9.264,9.264 24.306,9.264 33.57,0c9.264,-9.264 9.264,-24.306 -0,-33.569l-169.703,-169.703c-9.264,-9.264 -24.306,-9.264 -33.569,-0c-9.264,9.264 -9.264,24.306 -0,33.569Z" />
                                                <path d="M565.824,357.783l169.703,-169.703c9.264,-9.263 9.264,-24.305 -0,-33.569c-9.264,-9.264 -24.306,-9.264 -33.57,-0l-169.702,169.703c-9.264,9.263 -9.264,24.305 -0,33.569c9.263,9.264 24.305,9.264 33.569,0Z" />
                                            </g>
                                            <path d="M248.208,286.119c-46.272,0 -85.549,11.59 -127.875,45.003c-5.267,3.57 -8.812,9.17 -9.78,15.462c-0.967,6.292 0.73,12.696 4.683,17.68c3.96,4.991 9.811,8.102 16.16,8.586c6.341,0.49 12.602,-1.685 17.277,-6.009c36.455,-28.781 59.578,-35.003 99.534,-35.003c38.861,0 84.279,30.025 132.161,64.299c47.888,34.267 98.145,72.865 157.402,72.865c32.86,-0 69.396,-11.936 101.683,-44.77c4.689,-4.224 7.423,-10.201 7.549,-16.518c0.132,-6.311 -2.357,-12.395 -6.87,-16.813c-4.513,-4.412 -10.654,-6.763 -16.958,-6.493c-6.31,0.264 -12.225,3.13 -16.348,7.913c-24.738,25.161 -45.788,30.961 -69.056,30.961c-37.693,0 -82.79,-29.987 -130.734,-64.298c-47.938,-34.311 -98.824,-72.865 -158.83,-72.865l0.002,0Z" style="fill-rule:nonzero;" />
                                        </g>
                                    </svg>{{ $report->length }} Km
                                </span>

                                <span class="inline-flex items-center text-sm leading-none text-gray-600 dark:text-gray-300">

                                    <svg class="w-4 h-4 mr-1 fill-current text-gray-600 dark:text-gray-300" stroke="currentColor" viewBox="0 0 300 300" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;">
                                        <g transform="matrix(1,0,0,1,0,-7)">
                                            <g id="drop_p" transform="matrix(0.992891,0,0,1.00723,1.81485,5.69787)">
                                                <g transform="matrix(1.16249e-16,-1.87145,6.67579,4.02953e-16,-116.745,305.872)">
                                                    <path d="M64.154,47.335L103.239,47.335C103.239,47.335 103.239,53.678 103.239,53.678C103.239,54.221 104.461,54.702 106.272,54.872C108.082,55.042 110.072,54.863 111.209,54.428L146.771,40.807C147.932,40.362 147.932,39.753 146.771,39.308L111.209,25.687C110.072,25.251 108.082,25.072 106.272,25.242C104.461,25.413 103.239,25.894 103.239,26.436L103.239,32.779C103.239,32.779 64.154,32.779 64.154,32.779C64.154,32.779 64.154,26.436 64.154,26.436C64.154,25.894 62.932,25.413 61.121,25.242C59.311,25.072 57.321,25.251 56.184,25.687L20.622,39.308C19.461,39.753 19.461,40.362 20.622,40.807L56.184,54.428C57.321,54.863 59.311,55.042 61.121,54.872C62.932,54.702 64.154,54.221 64.154,53.678L64.154,47.335ZM59.733,44.821C57.292,44.821 55.313,45.384 55.313,46.078L55.313,49.876C55.313,49.876 29.678,40.057 29.678,40.057C29.678,40.057 55.313,30.238 55.313,30.238C55.313,30.238 55.313,34.037 55.313,34.037C55.313,34.731 57.292,35.294 59.733,35.294L107.66,35.294C110.101,35.294 112.08,34.731 112.08,34.037L112.08,30.238C112.08,30.238 137.715,40.057 137.715,40.057C137.715,40.057 112.08,49.876 112.08,49.876C112.08,49.876 112.08,46.078 112.08,46.078C112.08,45.384 110.101,44.821 107.66,44.821L59.733,44.821Z" />
                                                </g>
                                                <g transform="matrix(1.00716,0,0,0.992817,-8.19556,-3.97719)">
                                                    <path d="M55.026,293.555L260.444,293.555C265.043,293.555 268.777,289.821 268.777,285.221C268.777,280.622 265.043,276.888 260.444,276.888L55.026,276.888C50.427,276.888 46.693,280.622 46.693,285.221C46.693,289.821 50.427,293.555 55.026,293.555Z" />
                                                </g>
                                                <g transform="matrix(1.00716,0,0,0.992817,-8.19556,-264.883)">
                                                    <path d="M55.026,293.555L260.444,293.555C265.043,293.555 268.777,289.821 268.777,285.221C268.777,280.622 265.043,276.888 260.444,276.888L55.026,276.888C50.427,276.888 46.693,280.622 46.693,285.221C46.693,289.821 50.427,293.555 55.026,293.555Z" />
                                                </g>
                                                <g transform="matrix(1.49353,0,0,1.47227,-66.2177,-66.6728)">
                                                    <path d="M142.066,163.183L142.066,148.281L127.275,148.281L127.275,142.054L142.066,142.054L142.066,127.263L148.368,127.263L148.368,142.054L163.159,142.054L163.159,148.281L148.368,148.281L148.368,163.183L142.066,163.183Z" style="fill-rule:nonzero;" />
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    {{ $report->drop_p  }} m
                            </div>
                            <div>
                                <a href="{{ route('report.show', ($report->category?$report->category->translate()->slug:'none').'/'.$report->slug) }}" tabindex="-1" class="py-2 px-3 border text-gray-600 hover:bg-gray-50 dark:text-gray-300 text-sm rounded-lg dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-900 inline-flex items-center dark:hover:text-inalto-500 hover:text-inalto-400 md:mb-2 lg:mb-0">{{ __('inalto.read')}}
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
            <p>No Report</p>
            @endforelse
            @if($reports->hasMorePages())

    <livewire:frontend.load-more-reports :category="$category" :tag="$tag" :user_id="$user_id" :page=$page :perPage=$perPage  key="page-$page" />

@endif



        </div>
