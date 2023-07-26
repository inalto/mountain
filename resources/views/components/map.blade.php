@if ($latitude && $longitude)
<div id="poi-map" style="height: 400px;"></div>
@push('styles')
<link rel="stylesheet" href="/js/maps.css">
<script src="/js/maps.js"></script>
@endpush
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var map = L.map('poi-map').setView([{{ $latitude }}, {{ $longitude }}], 13);
            L.tileLayer("https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png", {
            scrollWheelZoom: false,
            attribution: 'Dati: © OpenStreetMap-Mitwirkende, SRTM | Base: © OpenTopoMap (CC-BY-SA) '
        }).addTo(map);

            
            @foreach($pins as $pin)
                var marker = L.marker([{{ $pin['latitude'] }}, {{ $pin['longitude'] }}]).addTo(map);
                @if(isset($pin['popupContent']))
                    marker.bindPopup('{!! $pin['popupContent'] !!}');
                @endif
            @endforeach

            
        });
    </script>
@endpush
@endif