<x-app-layout>
  <x-slot name="title">{{ $poi->name }}</x-slot>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight">
      {{ $poi->name }}
    </h2>
  </x-slot>
  <section class="report">
    <x-slot name="header">
      @auth
      <a href="{{route('admin.pois.edit',$poi->id)}}">
        @endauth

        <h1 class="text-xl font-semibold leading-tight dark:text-white" alt=" {{ $poi->nid }}">

          {{ $poi->name }}

          @auth
          <i class="fa fa-edit w-8 h-8 dark:text-white"></i>
          @endauth
        </h1>
        @auth
      </a>
      @endauth
    </x-slot>

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
    <x-maps :tracks="$poi->tracks"></x-maps>
  </section>

</x-app-layout>