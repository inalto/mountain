<x-slot name="header">
    <h1 class="text-xl font-semibold leading-tight">
        {{ $report->title }} - {{ $report->nid }}
    </h1>
</x-slot>


    <div class="w-full hero">
        <img class="w-full" @if ($report->getFirstMediaUrl('report_photos')) src="{{ $report->getFirstMediaUrl('report_photos') }}" alt="" @endif />
    </div>


<div class="body-font max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <div class="relative inline-block">
      <img class="inline-block object-cover w-12 h-12 rounded-full" src="https://images.pexels.com/photos/2955305/pexels-photo-2955305.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" alt="Profile image"/>
      <span class="absolute bottom-0 right-0 inline-block w-3 h-3 bg-green-600 border-2 border-white rounded-full"></span>
    </div>

    <div class="inline-block">
    <h2 class="text-sm font-medium text-gray-500 dark:text-gray-300 title-font ">{{ $report->owner->name }}</h2>
    <p>{{ $report->owner->first_name }} {{ $report->owner->last_name }}</p>
    </div>  
  </div>
    
    <div class="flex flex-wrap w-full">
        
    <div class="body-font prose max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

        <div class="border-t border-gray-200">
            <dl>
                @if ($report->difficulty)
              <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                <svg  class="inline-block w-6 h-6 mr-1 fill-current text-gray-600" stroke="currentColor" viewBox="0 0 24 24" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;">
                  <g transform="matrix(0.069632,0,0,0.0688971,0.750933,0.978575)">
                     
                      <g transform="matrix(1.56886,0,0,1.58559,-78.4078,-78.1253)">
                          <g transform="matrix(1,0,0,1,4.70588,-7.84314)">
                              <path d="M130.276,48.543L132.165,48.661L133.937,48.898L135.591,49.37L137.244,49.961L138.78,50.669L140.315,51.496L141.614,52.559L142.913,53.74L143.976,54.921L145.039,56.339L145.866,57.756L146.693,59.409L147.638,62.717L147.874,64.488L147.992,66.378L147.874,68.268L147.638,70.039L146.693,73.346L145.866,75L145.039,76.417L143.976,77.835L142.913,79.016L141.614,80.197L140.315,81.26L138.78,82.087L137.244,82.795L135.591,83.386L137.244,83.622L138.425,83.858L139.606,84.213L140.669,84.685L141.732,85.276L142.795,85.984L143.74,86.811L144.685,87.756L145.512,88.701L146.22,89.764L146.811,90.709L147.165,91.181L147.52,91.89L154.016,105.591L165.591,101.929L162.165,88.11L162.047,87.874L162.047,86.693L162.165,86.457L162.165,86.102L162.283,85.866L162.283,85.748L162.402,85.63L162.402,85.276L162.52,85.157L162.52,85.039L162.756,84.803L162.874,84.567L163.11,84.331L163.228,84.094L163.701,83.622L163.937,83.504L164.173,83.268L164.882,82.913L165.236,82.795L165.472,82.677L165.827,82.559L167.008,82.559L167.244,82.677L167.598,82.677L167.835,82.795L167.953,82.795L168.071,82.913L168.425,82.913L168.661,83.031L168.898,83.268L169.134,83.386L169.37,83.622L169.606,83.74L169.724,83.976L169.961,84.213L170.079,84.449L170.315,84.685L170.669,85.394L170.787,85.748L170.906,85.984L175.039,102.52L175.276,102.756L175.984,103.228L176.457,103.819L177.047,104.409L177.402,105L177.756,105.709L178.228,107.126L178.346,107.835L178.346,108.661L178.228,109.37L178.11,110.197L177.638,111.614L177.402,112.205L195.827,186.378L195.827,186.732L195.945,186.969L195.945,187.913L195.827,188.15L195.827,188.504L195.709,188.74L195.709,188.976L195.591,189.094L195.591,189.331L195.354,189.803L195.118,190.039L195,190.276L194.764,190.512L194.528,190.63L194.291,190.866L194.055,190.984L193.819,191.22L192.874,191.693L192.52,191.811L192.283,191.929L191.693,191.929L191.339,192.047L191.102,191.929L190.512,191.929L190.157,191.811L189.685,191.575L189.331,191.457L189.094,191.339L188.858,191.102L188.622,190.984L188.504,190.748L188.031,190.276L187.913,190.039L187.677,189.803L187.205,188.858L187.087,188.504L169.488,117.52L152.244,123.071L151.535,123.189L150.709,123.307L149.173,123.307L148.465,123.189L147.638,122.953L146.929,122.717L145.512,122.008L145.394,121.89L142.323,146.575L162.874,149.409L163.819,149.646L164.646,149.882L165.591,150.354L166.417,150.827L167.244,151.417L167.598,151.654L168.425,152.362L169.134,153.071L169.724,153.78L170.906,155.433L171.378,156.26L171.732,157.205L171.969,158.15L172.087,159.094L172.087,160.039L171.732,193.465L171.732,194.409L171.26,196.299L170.906,197.126L170.433,198.071L169.843,198.898L169.252,199.606L167.835,201.024L167.126,201.614L166.181,202.087L165.354,202.559L164.409,202.913L163.583,203.15L162.638,203.386L161.693,203.386L159.803,203.15L158.858,202.913L157.913,202.441L157.087,202.087L155.433,200.906L154.016,199.488L152.835,197.835L152.48,197.008L152.008,196.063L151.772,195.118L151.535,193.228L151.89,168.425L131.102,165.472L130.63,165.591L129.685,165.709L131.811,189.685L131.811,191.575L131.575,192.52L131.575,192.638L131.339,193.583L122.244,225.591L122.008,226.535L121.063,228.189L120.354,229.016L119.764,229.724L117.283,231.496L116.457,231.969L115.512,232.323L114.567,232.559L113.504,232.795L112.559,232.913L111.614,232.913L110.669,232.795L108.78,232.323L107.126,231.378L106.417,230.787L105.709,230.079L105,229.252L104.409,228.425L103.465,226.772L103.11,225.827L102.756,224.764L102.52,223.819L102.402,222.874L102.402,221.929L102.52,220.984L102.756,220.039L111.496,189.094L108.898,159.685L108.543,159.331L107.835,158.268L107.244,157.205L106.654,156.024L106.299,154.961L105.945,153.661L105.709,152.48L105.709,150.118L108.071,131.22L100.984,118.228L100.748,117.638L100.512,116.811L100.276,116.102L100.276,113.74L100.394,112.913L100.63,112.087L100.866,111.378L101.575,109.961L102.047,109.252L102.402,108.78L112.913,91.535L113.386,90.945L113.622,90.591L113.858,89.882L114.449,88.819L115.157,87.874L115.984,86.929L116.929,85.984L117.874,85.157L118.937,84.449L121.063,83.268L122.244,82.795L122.953,82.677L121.772,82.087L120.236,81.26L118.937,80.197L117.638,79.016L116.575,77.835L115.512,76.417L114.685,75L113.858,73.346L112.913,70.039L112.677,68.268L112.559,66.378L112.677,64.488L112.913,62.717L113.858,59.409L114.685,57.756L115.512,56.339L116.575,54.921L117.638,53.74L118.937,52.559L120.236,51.496L121.772,50.669L123.307,49.961L124.961,49.37L126.614,48.898L128.386,48.661L130.276,48.543Z"/>
                          </g>
                          <path d="M79.666,257.876L108.286,234.339C108.286,234.339 144.01,235.279 144.01,235.279C145.415,235.316 146.742,234.631 147.525,233.463L166.723,204.855C166.723,204.855 207.703,191.954 207.703,191.954C208.779,191.615 209.668,190.848 210.162,189.833L227.22,154.735C228.211,152.698 227.361,150.24 225.323,149.25C223.286,148.26 220.828,149.11 219.838,151.147L203.552,184.655C203.552,184.655 162.885,197.458 162.885,197.458C161.996,197.738 161.229,198.312 160.71,199.086L141.968,227.015C141.968,227.015 106.971,226.094 106.971,226.094C105.983,226.068 105.019,226.399 104.256,227.026L74.452,251.536C72.703,252.975 72.45,255.563 73.889,257.313C75.328,259.062 77.916,259.314 79.666,257.876Z"/>
                      </g>
                  </g>
              </svg>
                
                  {{ trans('cruds.report.fields.difficulty') }}
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                  {{ $report->difficulty }}
                </dd>
                
              </div>
              @endif
              
              @if ($report->altitude_s)
              <div class="border-t bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                
                <dt class="text-sm font-medium text-gray-500">
                  <svg  class="inline-block w-6 h-6 mr-1 fill-current text-gray-600" stroke="currentColor" viewBox="0 0 300 300" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;">
                    <g transform="matrix(1,0,0,1,-352,-3)">
                        <g id="partenza" transform="matrix(1.13473,0,0,0.999215,-48.557,6.52911)">
                            <g transform="matrix(1.01718e-16,-1.88647,5.84131,4.06187e-16,250.682,307.495)">
                                <path d="M64.154,47.335L152.753,47.335C155.194,47.335 157.174,46.772 157.174,46.078L157.174,34.037C157.174,33.342 155.194,32.779 152.753,32.779L64.154,32.779C64.154,32.779 64.154,26.436 64.154,26.436C64.154,25.894 62.932,25.413 61.121,25.242C59.311,25.072 57.321,25.251 56.184,25.687L20.622,39.308C19.461,39.753 19.461,40.362 20.622,40.807L56.184,54.428C57.321,54.863 59.311,55.042 61.121,54.872C62.932,54.702 64.154,54.221 64.154,53.678L64.154,47.335ZM59.733,44.821C57.292,44.821 55.313,45.384 55.313,46.078L55.313,49.876C55.313,49.876 29.678,40.057 29.678,40.057C29.678,40.057 55.313,30.238 55.313,30.238C55.313,30.238 55.313,34.037 55.313,34.037C55.313,34.731 57.292,35.294 59.733,35.294L148.332,35.294C148.332,35.294 148.332,44.821 148.332,44.821C129.851,44.821 59.733,44.821 59.733,44.821Z"/>
                            </g>
                            <g transform="matrix(0.881265,0,0,1.00079,345.662,-4.841)">
                                <path d="M55.026,293.555L260.444,293.555C265.043,293.555 268.777,289.821 268.777,285.221C268.777,280.622 265.043,276.888 260.444,276.888L55.026,276.888C50.427,276.888 46.693,280.622 46.693,285.221C46.693,289.821 50.427,293.555 55.026,293.555Z"/>
                            </g>
                        </g>
                    </g>
                </svg>
                
                  {{ trans('cruds.report.fields.altitude_s') }}
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                  {{ $report->altitude_s }}&nbsp;m
                </dd>
                
              </div>
              @endif
           
              @if ($report->altitude_e)
              <div class="border-t bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                
                <dt class="text-sm font-medium text-gray-500">
                  <svg  class="inline-block w-6 h-6 mr-1 fill-current text-gray-600" stroke="currentColor" viewBox="0 0 300 300" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;">
                    <g transform="matrix(1,0,0,1,-682,0)">
                        <g id="arrivo" transform="matrix(0.968375,0,0,0.996043,21.1851,2.86707)">
                            <g transform="matrix(1.19192e-16,-1.89248,6.84479,4.0748e-16,563.537,312.151)">
                                <path d="M12.872,46.078C12.872,46.772 14.851,47.335 17.293,47.335L103.239,47.335C103.239,47.335 103.239,53.678 103.239,53.678C103.239,54.221 104.461,54.702 106.272,54.872C108.082,55.042 110.072,54.863 111.209,54.428L146.771,40.807C147.932,40.362 147.932,39.753 146.771,39.308L111.209,25.687C110.072,25.251 108.082,25.072 106.272,25.242C104.461,25.413 103.239,25.894 103.239,26.436L103.239,32.779C85.094,32.779 17.293,32.779 17.293,32.779C14.851,32.779 12.872,33.342 12.872,34.037L12.872,46.078ZM21.714,44.821L21.714,35.294C21.714,35.294 107.66,35.294 107.66,35.294C110.101,35.294 112.08,34.731 112.08,34.037L112.08,30.238C112.08,30.238 137.715,40.057 137.715,40.057C137.715,40.057 112.08,49.876 112.08,49.876C112.08,49.876 112.08,46.078 112.08,46.078C112.08,45.384 110.101,44.821 107.66,44.821L21.714,44.821Z"/>
                            </g>
                            <g transform="matrix(1.03266,0,0,1.00397,674.834,-265.017)">
                                <path d="M55.026,293.555L260.444,293.555C265.043,293.555 268.777,289.821 268.777,285.221C268.777,280.622 265.043,276.888 260.444,276.888L55.026,276.888C50.427,276.888 46.693,280.622 46.693,285.221C46.693,289.821 50.427,293.555 55.026,293.555Z"/>
                            </g>
                        </g>
                    </g>
                </svg>
                
                  {{ trans('cruds.report.fields.altitude_e') }}
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                  {{ $report->altitude_e }}&nbsp;m
                </dd>
                
              </div>
              @endif
           
              @if ($report->drop_p)
              <div class="border-t bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                
                <dt class="text-sm font-medium text-gray-500">
                  <svg class="inline-block w-6 h-6 mr-1 fill-current text-gray-600" stroke="currentColor"  viewBox="0 0 300 300" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;">
                    <g transform="matrix(1,0,0,1,0,-7)">
                      <g id="drop_p" transform="matrix(0.992891,0,0,1.00723,1.81485,5.69787)">
                          <g transform="matrix(1.16249e-16,-1.87145,6.67579,4.02953e-16,-116.745,305.872)">
                              <path d="M64.154,47.335L103.239,47.335C103.239,47.335 103.239,53.678 103.239,53.678C103.239,54.221 104.461,54.702 106.272,54.872C108.082,55.042 110.072,54.863 111.209,54.428L146.771,40.807C147.932,40.362 147.932,39.753 146.771,39.308L111.209,25.687C110.072,25.251 108.082,25.072 106.272,25.242C104.461,25.413 103.239,25.894 103.239,26.436L103.239,32.779C103.239,32.779 64.154,32.779 64.154,32.779C64.154,32.779 64.154,26.436 64.154,26.436C64.154,25.894 62.932,25.413 61.121,25.242C59.311,25.072 57.321,25.251 56.184,25.687L20.622,39.308C19.461,39.753 19.461,40.362 20.622,40.807L56.184,54.428C57.321,54.863 59.311,55.042 61.121,54.872C62.932,54.702 64.154,54.221 64.154,53.678L64.154,47.335ZM59.733,44.821C57.292,44.821 55.313,45.384 55.313,46.078L55.313,49.876C55.313,49.876 29.678,40.057 29.678,40.057C29.678,40.057 55.313,30.238 55.313,30.238C55.313,30.238 55.313,34.037 55.313,34.037C55.313,34.731 57.292,35.294 59.733,35.294L107.66,35.294C110.101,35.294 112.08,34.731 112.08,34.037L112.08,30.238C112.08,30.238 137.715,40.057 137.715,40.057C137.715,40.057 112.08,49.876 112.08,49.876C112.08,49.876 112.08,46.078 112.08,46.078C112.08,45.384 110.101,44.821 107.66,44.821L59.733,44.821Z"/>
                          </g>
                          <g transform="matrix(1.00716,0,0,0.992817,-8.19556,-3.97719)">
                              <path d="M55.026,293.555L260.444,293.555C265.043,293.555 268.777,289.821 268.777,285.221C268.777,280.622 265.043,276.888 260.444,276.888L55.026,276.888C50.427,276.888 46.693,280.622 46.693,285.221C46.693,289.821 50.427,293.555 55.026,293.555Z"/>
                          </g>
                          <g transform="matrix(1.00716,0,0,0.992817,-8.19556,-264.883)">
                              <path d="M55.026,293.555L260.444,293.555C265.043,293.555 268.777,289.821 268.777,285.221C268.777,280.622 265.043,276.888 260.444,276.888L55.026,276.888C50.427,276.888 46.693,280.622 46.693,285.221C46.693,289.821 50.427,293.555 55.026,293.555Z"/>
                          </g>
                          <g transform="matrix(1.49353,0,0,1.47227,-66.2177,-66.6728)">
                              <path d="M142.066,163.183L142.066,148.281L127.275,148.281L127.275,142.054L142.066,142.054L142.066,127.263L148.368,127.263L148.368,142.054L163.159,142.054L163.159,148.281L148.368,148.281L148.368,163.183L142.066,163.183Z" style="fill-rule:nonzero;"/>
                          </g>
                      </g>
                  </g>
                </svg>
                  {{ trans('cruds.report.fields.drop_p') }}
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                  {{ $report->drop_p }}&nbsp;m
                </dd>
                
              </div>
              @endif
           
              @if ($report->drop_n)
              <div class="border-t bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                
                <dt class="text-sm font-medium text-gray-500">
                  <svg class="inline-block w-6 h-6 mr-1 fill-current text-gray-600" stroke="currentColor"  viewBox="0 0 300 300" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;">
                    <g transform="matrix(1,0,0,1,-340,-7)">
                      <g id="drop_n" transform="matrix(0.992891,0,0,1.00723,341.815,5.69787)">
                          
                          <g transform="matrix(1.16249e-16,-1.87145,6.67579,4.02953e-16,-116.745,305.872)">
                              <path d="M64.154,47.335L103.239,47.335C103.239,47.335 103.239,53.678 103.239,53.678C103.239,54.221 104.461,54.702 106.272,54.872C108.082,55.042 110.072,54.863 111.209,54.428L146.771,40.807C147.932,40.362 147.932,39.753 146.771,39.308L111.209,25.687C110.072,25.251 108.082,25.072 106.272,25.242C104.461,25.413 103.239,25.894 103.239,26.436L103.239,32.779C103.239,32.779 64.154,32.779 64.154,32.779C64.154,32.779 64.154,26.436 64.154,26.436C64.154,25.894 62.932,25.413 61.121,25.242C59.311,25.072 57.321,25.251 56.184,25.687L20.622,39.308C19.461,39.753 19.461,40.362 20.622,40.807L56.184,54.428C57.321,54.863 59.311,55.042 61.121,54.872C62.932,54.702 64.154,54.221 64.154,53.678L64.154,47.335ZM59.733,44.821C57.292,44.821 55.313,45.384 55.313,46.078L55.313,49.876C55.313,49.876 29.678,40.057 29.678,40.057C29.678,40.057 55.313,30.238 55.313,30.238C55.313,30.238 55.313,34.037 55.313,34.037C55.313,34.731 57.292,35.294 59.733,35.294L107.66,35.294C110.101,35.294 112.08,34.731 112.08,34.037L112.08,30.238C112.08,30.238 137.715,40.057 137.715,40.057C137.715,40.057 112.08,49.876 112.08,49.876C112.08,49.876 112.08,46.078 112.08,46.078C112.08,45.384 110.101,44.821 107.66,44.821L59.733,44.821Z"/>
                          </g>
                          <g transform="matrix(1.00716,0,0,0.992817,-8.19556,-3.97719)">
                              <path d="M55.026,293.555L260.444,293.555C265.043,293.555 268.777,289.821 268.777,285.221C268.777,280.622 265.043,276.888 260.444,276.888L55.026,276.888C50.427,276.888 46.693,280.622 46.693,285.221C46.693,289.821 50.427,293.555 55.026,293.555Z"/>
                          </g>
                          <g transform="matrix(1.00716,0,0,0.992817,-8.19556,-264.883)">
                              <path d="M55.026,293.555L260.444,293.555C265.043,293.555 268.777,289.821 268.777,285.221C268.777,280.622 265.043,276.888 260.444,276.888L55.026,276.888C50.427,276.888 46.693,280.622 46.693,285.221C46.693,289.821 50.427,293.555 55.026,293.555Z"/>
                          </g>
                          <g transform="matrix(2.66566,0,0,1.65502,-210.785,-102.829)">
                              <rect x="125.459" y="148.949" width="20.5" height="6.71" style="fill-rule:nonzero;"/>
                          </g>
                      </g>
                  </g>
                </svg>
                  {{ trans('cruds.report.fields.drop_n') }}
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                  {{ $report->drop_n }}&nbsp;m
                </dd>
                
              </div>
              @endif
           
              
              @if ($report->time_a)
              <div class="border-t bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                
                <dt class="text-sm font-medium text-gray-500">
                  <svg  class="inline-block w-6 h-6 mr-1 fill-current text-gray-600" stroke="currentColor" viewBox="0 0 300 300" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;">
                    <g transform="matrix(1,0,0,1,-10,-356)">
                        <g id="time_a" transform="matrix(1.05555,0,0,1.05555,-0.733855,-20.0186)">
                            <g transform="matrix(6.40988e-17,-1.04681,1.04139,6.37668e-17,-218.687,886.049)">
                                <path d="M317.588,430.369L317.588,400.863L370.157,400.863L370.157,386.109L428.864,415.616L370.157,445.123L370.157,430.369L317.588,430.369Z"/>
                            </g>
                            <g transform="matrix(0.951971,0,0,0.951971,15.8305,363.79)">
                                <path d="M141.909,283.8C169.974,283.798 197.408,275.474 220.742,259.881C244.075,244.288 262.262,222.126 273.002,196.197C283.74,170.268 286.548,141.736 281.072,114.211C275.596,86.686 262.08,61.402 242.236,41.558C222.39,21.714 197.106,8.2 169.58,2.726C142.054,-2.749 113.523,0.062 87.595,10.802C61.667,21.543 39.506,39.73 23.914,63.066C8.322,86.401 0,113.835 0,141.9C0.038,179.524 15.001,215.596 41.607,242.199C68.212,268.802 104.285,283.765 141.909,283.8ZM141.909,23.079C165.41,23.081 188.382,30.052 207.921,43.109C227.461,56.167 242.688,74.725 251.682,96.438C260.672,118.15 263.024,142.041 258.438,165.09C253.853,188.139 242.534,209.31 225.917,225.927C209.298,242.543 188.126,253.86 165.076,258.443C142.027,263.026 118.136,260.672 96.425,251.679C74.713,242.684 56.156,227.455 43.101,207.914C30.045,188.374 23.076,165.401 23.077,141.9C23.109,110.395 35.64,80.189 57.918,57.913C80.197,35.636 110.404,23.109 141.909,23.079Z" style="fill-rule:nonzero;"/>
                            </g>
                            <g transform="matrix(-0.951971,0,0,0.951971,285.827,364.737)">
                                <path d="M175.555,184.089C177.885,184.092 180.161,183.389 182.084,182.073C184.008,180.758 185.487,178.89 186.328,176.718C187.17,174.545 187.334,172.168 186.798,169.9C186.263,167.632 185.054,165.58 183.33,164.013L153.424,136.782L153.424,50.359C153.424,47.298 152.208,44.364 150.045,42.2C147.881,40.036 144.946,38.82 141.886,38.82C138.825,38.82 135.891,40.036 133.727,42.2C131.563,44.364 130.347,47.298 130.347,50.359L130.347,147.003L167.78,181.08C169.904,183.02 172.678,184.094 175.555,184.089Z" style="fill-rule:nonzero;"/>
                            </g>
                        </g>
                    </g>
                </svg>

                  {{ trans('cruds.report.fields.time_a') }}
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ Carbon\Carbon::create($report->time_r)->format("H\hi'") }}
                </dd>
                
              </div>
              @endif
    
              @if ($report->time_r)
              <div class="border-t bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                
                <dt class="text-sm font-medium text-gray-500">
                  <svg class="inline-block w-6 h-6 mr-1 fill-current text-gray-600" stroke="currentColor" viewBox="0 0 300 300" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;">
                    <g transform="matrix(1,0,0,1,-360,-353)">
                        <g id="time_r" transform="matrix(1.00795,0,0,1.04909,-3.19096,-18.2674)">
                            <g transform="matrix(6.71261e-17,1.05326,-1.09057,6.41596e-17,1027.18,100.788)">
                                <path d="M317.588,430.369L317.588,400.863L370.157,400.863L370.157,386.109L428.864,415.616L370.157,445.123L370.157,430.369L317.588,430.369Z"/>
                            </g>
                            <g transform="matrix(0.99693,0,0,0.957835,366.256,361.52)">
                                <path d="M141.909,283.8C169.974,283.798 197.408,275.474 220.742,259.881C244.075,244.288 262.262,222.126 273.002,196.197C283.74,170.268 286.548,141.736 281.072,114.211C275.596,86.686 262.08,61.402 242.236,41.558C222.39,21.714 197.106,8.2 169.58,2.726C142.054,-2.749 113.523,0.062 87.595,10.802C61.667,21.543 39.506,39.73 23.914,63.066C8.322,86.401 0,113.835 0,141.9C0.038,179.524 15.001,215.596 41.607,242.199C68.212,268.802 104.285,283.765 141.909,283.8ZM141.909,23.079C165.41,23.081 188.382,30.052 207.921,43.109C227.461,56.167 242.688,74.725 251.682,96.438C260.672,118.15 263.024,142.041 258.438,165.09C253.853,188.139 242.534,209.31 225.917,225.927C209.298,242.543 188.126,253.86 165.076,258.443C142.027,263.026 118.136,260.672 96.425,251.679C74.713,242.684 56.156,227.455 43.101,207.914C30.045,188.374 23.076,165.401 23.077,141.9C23.109,110.395 35.64,80.189 57.918,57.913C80.197,35.636 110.404,23.109 141.909,23.079Z" style="fill-rule:nonzero;"/>
                            </g>
                            <g transform="matrix(-0.99693,0,0,0.957835,649.004,362.474)">
                                <path d="M175.555,184.089C177.885,184.092 180.161,183.389 182.084,182.073C184.008,180.758 185.487,178.89 186.328,176.718C187.17,174.545 187.334,172.168 186.798,169.9C186.263,167.632 185.054,165.58 183.33,164.013L153.424,136.782L153.424,50.359C153.424,47.298 152.208,44.364 150.045,42.2C147.881,40.036 144.946,38.82 141.886,38.82C138.825,38.82 135.891,40.036 133.727,42.2C131.563,44.364 130.347,47.298 130.347,50.359L130.347,147.003L167.78,181.08C169.904,183.02 172.678,184.094 175.555,184.089Z" style="fill-rule:nonzero;"/>
                            </g>
                        </g>
                    </g>
                </svg>
                
                  {{ trans('cruds.report.fields.time_r') }}
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                  {{ Carbon\Carbon::create($report->time_r)->format("H\hi'") }}
                </dd>
                
              </div>
              @endif
    
            </dl>
        </div>
    

            {!!$report->content!!}




    </div>

    <div class="body-font w-full max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

    <div class="grid gap-2 grid-cols-1 md:grid-cols-4 lg:grid-cols-6">

          
          
      @foreach($report->photos as $photo) 
      
      <div class="photo shadow-lg  rounded bg-white overflow-hidden">
        <img src="{{$photo['preview_thumbnail']}}" class=" w-full h-auto border-none"/>
        <div class="text-xs text-gray-700 text-center p-2">{{$photo['name']}}</div>
      </div>
      
      @endforeach
      </div>
    </div>      

</div>
