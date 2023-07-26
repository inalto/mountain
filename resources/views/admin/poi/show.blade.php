<x-admin-layout>
    <div class="card">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.poi.title_singular') }}:
                    {{ trans('cruds.poi.fields.id') }}
                    {{ $poi->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">



    <div class="w-full hero">
      <img class="w-full" @if ($poi->getFirstMediaUrl('poi_photos')) src="{{ $poi->getFirstMediaUrl('poi_photos') }}" alt="" @endif />
    </div>


    <div class="rs bg-white dark:bg-gray-800 dark:text-gray-200 body-font  flex justify-between">

      <x-avatar :user="$poi->owner" show="true"></x-avatar>

    <div class="text-sm">
      {{__('cruds.report.fields.last_survey')}}: {{ \Carbon\Carbon::parse($poi->last_survey)->format('d/m/Y') }}
    </div>
</div>


    <div class="rs bg-white dark:bg-gray-800 dark:text-gray-200 body-font prose">

      <x-tags :tags="$poi->tags"></x-tags>


      @if ($poi->access)
      <h2>{{ trans('cruds.report.fields.access') }}</h2>
      {!!$poi->access!!}
      @endif
      @if ($poi->excerpt)
      <h2>{{ trans('cruds.report.fields.intro') }}</h2>
      {!!$poi->excerpt!!}
      @endif
      @if ($poi->content)
      <h2>{{ trans('cruds.report.fields.description') }}</h2>
      {!!$poi->content!!}
      @endif
    </div>





  </section>
  <section class="rs bg-transparent">
    <x-report.gallery :photos="$poi->photos" :date="$poi->created_at->format('Y')" :author="$poi->owner">
      </x-report.galley>
  </section>


<section>
  <x-map :latitude="$poi->location['lat']" :longitude="$poi->location['lon']" :pins="[0=>['latitude'=>$poi->location['lat'],'longitude'=>$poi->location['lon'],'popupContent'=>$poi->name]]"></x-map>
</section>

  <section>
    <x-maps :tracks="$poi->tracks"></x-maps>
  </section>

        </div>
    </div>
</x-admin-layout>
