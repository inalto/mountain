@extends('layouts.default')
@section('content')
<div class="p-8 container">

i am the home page

@foreach ($reports as $report)
{{$report->title}}<br>
@endforeach
</div>
@stop