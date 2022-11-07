@props(['bibliographies'])

@if ($bibliographies && (count($bibliographies) > 0))
<div class="body-font w-full max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 prose ">
    <h2>Riferimenti Bibliografici</h2>
    <ul>
        @foreach($bibliographies as $bibliograpy)
        <li>
            @if (array_key_exists('link',$bibliograpy))
            <a href="{{$bibliograpy['link'] }}" target="_blank">{{$bibliograpy['title'] }}</a>
            @else
            {{$bibliograpy['title'] }}
            @endif
            @if(array_key_exists('author',$bibliograpy))
            - {{$bibliograpy['author'] }} 
            @endif
            @if(array_key_exists('publisher',$bibliograpy))
            - {{$bibliograpy['publisher'] }}
            @endif
        
            </li>
        @endforeach
    </ul>
</div>
@endif