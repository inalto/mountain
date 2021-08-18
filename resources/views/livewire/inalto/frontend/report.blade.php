<x-slot name="header">
    <h1 class="text-xl font-semibold leading-tight">
        {{ $report->title }}
    </h1>
</x-slot>


    <div class="w-full hero">
        <img class="w-full" @if ($report->getFirstMediaUrl('report_photos')) src="{{ $report->getFirstMediaUrl('report_photos') }}" alt="" @endif />
    </div>


    
    <div class="flex flex-wrap w-full">
        
    <div class="body-font prose max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

        <div class="border-t border-gray-200">
            <dl>
                @if ($report->difficulty)
              <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                
                <dt class="text-sm font-medium text-gray-500">
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
                  {{ trans('cruds.report.fields.altitude_e') }}
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                  {{ $report->altitude_e }}&nbsp;m
                </dd>
                
              </div>
              @endif
           
              @if ($report->drop)
              <div class="border-t bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                
                <dt class="text-sm font-medium text-gray-500">
                  {{ trans('cruds.report.fields.drop') }}
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                  {{ $report->drop }}&nbsp;m
                </dd>
                
              </div>
              @endif
           
              
              @if ($report->time_a)
              <div class="border-t bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                
                <dt class="text-sm font-medium text-gray-500">
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
                  {{ trans('cruds.report.fields.time_r') }}
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                  {{ Carbon\Carbon::create($report->time_r)->format("H\hi'") }}
                </dd>
                
              </div>
              @endif
    
            </dl>
        </div>
    


        <h3 class="mb-1 text-xs font-medium text-gray-500 dark:text-gray-300 title-font ">
            {{ $report->owner->name }}</h3>

            {!!$report->content!!}

    </div>
</div>
