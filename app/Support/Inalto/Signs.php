<?php

namespace App\Support\Inalto;

//use App\Models\Report;

class Signs
{
    public static function cai($content)
    {
        return
        '<span class="inline-flex w-12 h-6 relative"><svg width="100%" height="100%" viewBox="0 0 60 30" version="1.1" style="position:absolute;top:6px;fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:1.5;">
            <g transform="matrix(1,0,0,1,-104.187,-0.292386)">
                <g id="cai" transform="matrix(1.14216,0,0,1.27195,103.959,-46.5204)">
                    <rect x="0.199" y="36.804" width="52.532" height="23.586" style="fill:none;"/>
                    <g transform="matrix(0.87864,0,0,0.513333,-91.4138,37.1274)">
                        <rect x="105.264" y="0.901" width="57.795" height="10.721" style="fill:rgb(216,0,0);"/>
                    </g>
                    <g transform="matrix(0.87864,0,0,0.513333,-91.4138,53.6375)">
                        <rect x="105.264" y="0.901" width="57.795" height="10.721" style="fill:rgb(216,0,0);"/>
                    </g>
                    <g transform="matrix(0.889135,0,0,0.803796,-0.315556,7.69392)">
                        <rect x="1.564" y="37.194" width="57.113" height="27.387" style="fill:none;stroke:black;stroke-width:0.98px;"/>
                    </g>
                    <g transform="matrix(0.875535,0,0,0.786194,1.30479,36.7562)">
                        <text x="50%" y="19.359px" text-anchor="middle" style="font-family:\'ArialMT\', \'Arial\', sans-serif;font-size:12px;">'.$content.'</text>
                    </g>
                </g>
            </g>
        </svg>
        </span>';
    }

    public static function rectYellow($content)
    {
        return
        '<span class="inline-flex w-12 h-6 relative"><svg width="100%" height="100%" viewBox="0 0 60 30" version="1.1" style="position:absolute;top:6px;fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:1.5;">
            <g transform="matrix(1,0,0,1,-40.2519,0)">
                <g id="quadrato" transform="matrix(1.14216,0,0,1.27195,40.0241,-46.8128)">
                    <rect x="0.199" y="36.804" width="52.532" height="23.586" style="fill:none;"/>
                    <g transform="matrix(0.889135,0,0,0.803796,-0.315556,7.69392)">
                        <rect x="1.564" y="37.194" width="57.113" height="27.387" style="fill:rgb(255,198,0);stroke:black;stroke-width:0.98px;"/>
                    </g>
                    <g transform="matrix(0.875535,0,0,0.786194,1.30479,36.7562)">
                        <text x="50%" y="19.359px" text-anchor="middle" style="font-family:\'ArialMT\', \'Arial\', sans-serif;font-size:12px;">'.$content.'</text>
                    </g>
                </g>
            </g>
        </svg></span>';
    }

    public static function rectGreen($content)
    {
        return
        '<span class="inline-flex w-12 h-6 relative"><svg width="100%" height="100%" viewBox="0 0 60 30" version="1.1" style="position:absolute;top:6px;fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:1.5;"><rect id="auto" x="-0" y="0" width="60" height="30" style="fill:none;"/><path d="M59,4c-0,-1.657 -1.343,-3 -3,-3c-9.983,-0 -42.017,-0 -52,-0c-1.657,-0 -3,1.343 -3,3c-0,5.382 -0,16.618 -0,22c0,1.657 1.343,3 3,3c9.983,-0 42.017,-0 52,-0c1.657,0 3,-1.343 3,-3c-0,-5.382 -0,-16.618 -0,-22Z" style="fill:#268807;"/><path d="M56.611,6.007c-0,-1.657 -1.344,-3 -3,-3c-9.347,0 -37.875,0 -47.222,0c-1.656,0 -3,1.343 -3,3c0,4.608 0,13.378 0,17.986c0,1.657 1.344,3 3,3c9.347,-0 37.875,-0 47.222,-0c1.656,-0 3,-1.343 3,-3c-0,-4.608 -0,-13.378 -0,-17.986Z" style="fill:none;stroke:#ebebeb;stroke-width:1px;"/><text x="50%" y="19.107px" text-anchor="middle" style="font-family:\'ArialMT\', \'Arial\', sans-serif;font-size:12px;fill:#ebebeb;">'.$content.'</text></svg></span>';
    }

    public static function rectBlue($content)
    {
        return
        '<span class="inline-flex w-12 h-6 relative"><svg width="100%" height="100%" viewBox="0 0 60 30" version="1.1" style="position:absolute;top:6px;fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:1.5;"><rect id="ss" x="0" y="0" width="60" height="30" style="fill:none;"/><path d="M59,4c-0,-1.657 -1.343,-3 -3,-3c-9.983,-0 -42.017,-0 -52,-0c-1.657,-0 -3,1.343 -3,3c0,5.382 0,16.618 0,22c0,1.657 1.343,3 3,3c9.983,-0 42.017,-0 52,-0c1.657,0 3,-1.343 3,-3c0,-5.382 0,-16.618 -0,-22Z" style="fill:#1b4086;"/><path d="M56.611,6.007c-0,-1.657 -1.344,-3 -3,-3c-9.347,0 -37.875,0 -47.222,0c-1.656,0 -3,1.343 -3,3c0,4.608 0,13.378 0,17.986c0,1.657 1.344,3 3,3c9.347,-0 37.875,-0 47.222,-0c1.656,-0 3,-1.343 3,-3c-0,-4.608 -0,-13.378 -0,-17.986Z" style="fill:none;stroke:#ebebeb;stroke-width:1px;"/><text x="50%" y="19.107px" text-anchor="middle" style="font-family:\'ArialMT\', \'Arial\', sans-serif;font-size:12px;fill:#ebebeb;">'.$content.'</text></svg></span>';
    }

    public static function roundYellow($content)
    {
        return
        '<span class="inline-flex w-6 h-6 relative"><svg width="100%" height="100%" viewBox="0 0 30 30" version="1.1" style="position:absolute;top:6px;fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:1.5;">
            <g id="tondo" transform="matrix(0.322969,0,0,0.333387,-0.5625,-0.33871)">
                <rect x="1.742" y="1.016" width="92.888" height="89.985" style="fill:none;"/>
                <g transform="matrix(3.01026,0,0,2.91619,3.65087,2.7015)">
                    <circle cx="14.794" cy="14.851" r="14.4" style="fill:rgb(255,198,0);stroke:black;stroke-width:1.03px;"/>
                </g>
                <g transform="matrix(3.09627,0,0,2.99952,5.65076,0.833791)">
                    <text x="50%" y="19.359px" text-anchor="middle" style="font-family:\'ArialMT\', \'Arial\', sans-serif;font-size:12px;">'.$content.'</text>
                </g>
            </g>
        </svg></span>
        ';
    }

    public static function triangleYellow($content)
    {
        return '<span class="inline-flex w-6 h-6 relative"><svg width="100%" height="100%" viewBox="0 0 30 30" version="1.1"  style="position:absolute;top:6px;fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><rect id="triangolo" x="0" y="0" width="30" height="30" style="fill:none;"/><clipPath id="_clip1"><rect x="0" y="0" width="30" height="30"/></clipPath><g clip-path="url(#_clip1)"><path d="M15,0l15,30l-30,0l15,-30Z" style="fill:#ffc600;"/><path d="M15,-0l15,30l-30,0l15,-30Zm-0,2.236l13.382,26.764c-0,0 -26.764,0 -26.764,0l13.382,-26.764Z"/><text x="50%" y="20px"  dominant-baseline="middle" text-anchor="middle" style="font-family:\'ArialMT\', \'Arial\', sans-serif;font-size:10px;">'.$content.'</text></g></svg></span>';
    }

    public static function bassaYellow($content)
    {
        return '<span class="inline-flex w-6 h-6 relative"><svg width="100%" height="100%" viewBox="0 0 30 30" version="1.1" style="position:absolute;top:6px;fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><rect id="bassa" x="0" y="-0" width="30" height="30" style="fill:none;"/><clipPath id="_clip1"><rect x="0" y="-0" width="30" height="30"/></clipPath><g clip-path="url(#_clip1)"><path d="M15,30l-15,-30l30,0l-15,30Z" style="fill:#ffc600;"/><path d="M15,30l-15,-30l30,0l-15,30Zm0,-2.236l-13.382,-26.764c0,0 26.764,0 26.764,0l-13.382,26.764Z"/><text x="6.658px" y="9.434px" style="font-family:\'ArialMT\', \'Arial\', sans-serif;font-size:10px;">.$content.</text></g></svg></span>';
    }

    public static function dropPositive($content)
    {
        return '<span class="inline-flex w-12 h-6 relative"><svg width="100%" height="100%" viewBox="0 0 60 30" version="1.1" style="position:absolute;top:7px;fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><rect id="drop-plus" x="-0" y="0" width="60" height="30" style="fill:none;"/><path d="M59,4c-0,-1.657 -1.343,-3 -3,-3c-9.983,-0 -42.017,-0 -52,-0c-1.657,-0 -3,1.343 -3,3c-0,5.382 -0,16.618 -0,22c0,1.657 1.343,3 3,3c9.983,-0 42.017,-0 52,-0c1.657,0 3,-1.343 3,-3c-0,-5.382 -0,-16.618 -0,-22Z" style="fill:#d80000;"/><path d="M46.436,6.007c0,-0.796 -0.316,-1.559 -0.879,-2.121c-0.562,-0.563 -1.325,-0.879 -2.121,-0.879c-7.89,0 -29.156,0 -37.047,0c-0.795,0 -1.558,0.316 -2.121,0.879c-0.563,0.562 -0.879,1.325 -0.879,2.121c0,4.608 0,13.378 0,17.986c0,0.796 0.316,1.559 0.879,2.121c0.563,0.563 1.326,0.879 2.121,0.879c7.891,-0 29.157,-0 37.047,-0c0.796,-0 1.559,-0.316 2.121,-0.879c0.563,-0.562 0.879,-1.325 0.879,-2.121c0,-4.608 0,-13.378 0,-17.986Z" style="fill:#ebebeb;"/><text  x="45px" y="19.107px" text-anchor="end" style="font-family:\'ArialMT\', \'Arial\', sans-serif;font-size:12px;fill:#e81717;">'.$content.'</text><path d="M50.678,19.371l-1.983,0l3.966,-11.993l3.966,11.993l-1.983,0l0,2.823l-3.966,0l0,-2.823Z" style="fill:#ebebeb;"/></svg></span>';
    }

    public static function dropNegative($content)
    {
        return '<span class="inline-flex w-12 h-6 relative"><svg width="100%" height="100%" viewBox="0 0 60 30" version="1.1" style="position:absolute;top:7px;fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><rect id="drop-minus" x="-0" y="0" width="60" height="30" style="fill:none;"/><path d="M59,4c-0,-1.657 -1.343,-3 -3,-3c-9.983,-0 -42.017,-0 -52,-0c-1.657,-0 -3,1.343 -3,3c-0,5.382 -0,16.618 -0,22c0,1.657 1.343,3 3,3c9.983,-0 42.017,-0 52,-0c1.657,0 3,-1.343 3,-3c-0,-5.382 -0,-16.618 -0,-22Z" style="fill:#268807;"/><path d="M46.436,6.007c0,-0.796 -0.316,-1.559 -0.879,-2.121c-0.562,-0.563 -1.325,-0.879 -2.121,-0.879c-7.89,0 -29.156,0 -37.047,0c-0.795,0 -1.558,0.316 -2.121,0.879c-0.563,0.562 -0.879,1.325 -0.879,2.121c0,4.608 0,13.378 0,17.986c0,0.796 0.316,1.559 0.879,2.121c0.563,0.563 1.326,0.879 2.121,0.879c7.891,-0 29.157,-0 37.047,-0c0.796,-0 1.559,-0.316 2.121,-0.879c0.563,-0.562 0.879,-1.325 0.879,-2.121c0,-4.608 0,-13.378 0,-17.986Z" style="fill:#ebebeb;"/><text x="45px" y="19.107px" text-anchor="end" style="font-family:\'ArialMT\', \'Arial\', sans-serif;font-size:12px;fill:#268807;">'.$content.'</text><path d="M54.786,10.415l1.983,0l-3.966,11.993l-3.966,-11.993l1.983,0l-0,-2.823l3.966,0l-0,2.823Z" style="fill:#ebebeb;"/></svg></span>';
    }
}
