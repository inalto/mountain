@props(['tracks'=>[]])


@if (count($tracks) > 0)
<div  x-data='{tab:1}'>
    <div class="rs-pb-0 mb-0 prose">

        <h2 class="dark:text-white">Mappe</h2>

        <ul class="p-0 m-0 flex flex-wrap text-sm font-medium text-center text-gray-500  dark:text-gray-400">
            @foreach($tracks as $track)
            <li class="p-0 mt-0 ml-0 mr-2 mb-0 flex">
                <div x-bind:class="tab=={{$loop->iteration}}?'flex p-4 m-0 border-b-2 border-blue-700 hover:border-blue-800 dark:border-gray-700 text-gray-600 bg-white hover:bg-white rounded-t-lg active dark:bg-gray-800 dark:hover:bg-gray-700':'border-b-2 border-gray-200 hover:border-blue-800 flex m-0 p-4 bg-gray-200 hover:bg-white rounded-t-lg active dark:bg-gray-800 dark:hover:bg-gray-700'" aria-current="page" class="">
                    <a href="javascript:void(0);"  x-on:click.prevent="tab={{$loop->iteration}}" aria-current="page" class="text-gray-600 dark:text-gray-200 not-prose no-underline">{{$track['name']}}</a>
                    <a href="{{$track['url']}}"  target="_blank" download>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="not-prose  text-gray-600 dark:text-gray-200 w-6 h-6 ml-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 00-2.25 2.25v9a2.25 2.25 0 002.25 2.25h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25H15M9 12l3 3m0 0l3-3m-3 3V2.25" />
                        </svg>
                    </a>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    @foreach($tracks as $track)
    <div class="w-full bg-gray-100 dark:bg-gray-900" x-show="tab == {{$loop->iteration}}">

        <div id="map-{{$loop->iteration}}" class="h-full" style="width:100%;height:500px;"></div>
        <div id="map-elevation-{{$loop->iteration}}" class="h-full px-10" style="width:100%;height:500px;"></div>
    </div>
    @endforeach
</div>
@once
@push('styles')
<script type="text/javascript" src="/js/maps.js"></script>
<script type="text/javascript" src="/js/leaflet-elevation.min.js"></script>
<link rel="stylesheet" href="/js/leaflet-elevation.min.css">
<link rel="stylesheet" href="/js/maps.css">
@endpush
@endonce
@push('scripts')

<script defer>



    document.addEventListener("DOMContentLoaded", function(event) {

        let mylocale = {
			"Acceleration"      : "Accelerazione",
			"Altitude"          : "Altitudine",
			"Slope"             : "Pendenza",
			"Speed"             : "Velocità",
			"Total Length: "    : "Distanza: ",
			"Max Elevation: "   : "Altezza Max: ",
			"Min Elevation: "   : "Altezza Min: ",
			"Avg Elevation: "   : "Altezza Media: ",
			"Total Time: "      : "Durata: ",
			"Total Ascent: "    : "Salita: ",
			"Total Descent: "   : "Discesa: ",
			"Min Slope: "       : "Pendenza Min: ",
			"Max Slope: "       : "Pendenza Max: ",
			"Avg Slope: "       : "Pendenza Media: ",
			"Min Speed: "       : "Velocità Min: ",
			"Max Speed: "       : "Velocità Max: ",
			"Avg Speed: "       : "Velocità Media: ",
			"Min Acceleration: ": "Accelerazione Min: ",
			"Max Acceleration: ": "Accelerazione Max: ",
			"Avg Acceleration: ": "Accelerazione Media: ",
			"y: "				: "Altitudine: ",
			"x: "				: "Distanza: ",
			"t: "				: "Data: ",
			"T: "				: "Durata: ",
			"m: "				: "Pendenza: ",
			"v: "				: "Velocità: ",
			"a: "				: "Accelerazione: "
		};



        @foreach($tracks as $track)
        var elevation{{$loop->iteration}} = {
            theme: "lightblue-theme",
            detached: true,
            elevationDiv: "#map-elevation-{{$loop->iteration}}",
            autohide: false,
            collapsed: false,
            position: "topright",
            closeBtn: false,
            followMarker: false,
            autofitBounds: true,
            imperial: false,
            reverseCoords: false,
            acceleration: false,
            slope: false,
            speed: false,
            altitude: true,
            time: false,
            distance: true,
            summary: false,
            downloadLink: false,
            ruler: true,
            legend:false,
            almostOver: false,
            distanceMarkers: true,
            //hotline: false,
		    //marker: 'position-marker',
            marker: 'elevation-line',
            timestamps: false,
            waypoints: true,
            wptIcons: {
            '': L.divIcon({
                className: 'elevation-waypoint-marker',
                html: '<i class="elevation-waypoint-icon"></i>',
                iconSize: [30, 30],
                iconAnchor: [8, 30],
            }),
            },
            wptLabels: true,
            preferCanvas: false,
            yCoordMax: 0
            };


        var gpx{{$loop->iteration}}="{{$track['url']}}";
		L.registerLocale('it', mylocale);
		L.setLocale('it');
        var map{{$loop->iteration}}=L.map('map-{{$loop->iteration}}', {
            minZoom: 9,
            maxZoom: 17
        }).setView([51.505, -0.09], 13);

        L.tileLayer("https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png", {
            scrollWheelZoom: false,
            attribution: 'Dati: © OpenStreetMap-Mitwirkende, SRTM | Base: © OpenTopoMap (CC-BY-SA) '
        }).addTo(map{{$loop->iteration}});
        new L.GPX(gpx{{$loop->iteration}}, {
            async: true,
            marker_options: {
                startIconUrl: '/theme/maps/pin-icon-start.png',
                endIconUrl: '/theme/maps/pin-icon-end.png',
                shadowUrl: '/theme/maps/pin-shadow.png',
                wptIconUrls: {
                    '': '/theme/maps/pin-icon-wpt.png',
                }
            },
            polyline_options: {
                color: '#9de23a',
                opacity: 0.75,
                weight: 5,
                lineCap: 'round'
            }
        }).on('loaded', function(e) {
            map{{$loop->iteration}}.fitBounds(e.target.getBounds());
        }).addTo(map{{$loop->iteration}});
        map{{$loop->iteration}}.scrollWheelZoom.disable();
        map{{$loop->iteration}}.on('click', function() {
            if (map{{$loop->iteration}}.scrollWheelZoom.enabled()) {
                map{{$loop->iteration}}.scrollWheelZoom.disable();
            } else {
                map{{$loop->iteration}}.scrollWheelZoom.enable();
            }
        });
        var controlElevation = L.control.elevation(elevation{{$loop->iteration}}).addTo(map{{$loop->iteration}});
        controlElevation.load(gpx{{$loop->iteration}});
        @endforeach
    });
</script>


 @endpush
@endif