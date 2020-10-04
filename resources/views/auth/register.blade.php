@extends('layouts.default')

@section('content')
<div class="flex flex-wrap h-full">
    <div class="w-full md:w-1/2 bg-grey-light h-64 md:h-full" style="background-image: url('storage/theme/login_back.jpg');background-size:cover;background-position:center;">
    </div>
    <div class="w-full md:w-1/2 bg-grey flex justify-content md:h-full items-center">
<livewire:register />
    </div>
</div>
@endsection