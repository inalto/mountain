<?php

namespace App\Support\Inalto;

class ParseReport
{
    public static function beautify($payload)
    {
        $payload = self::timeParser($payload);
        $payload = self::routeSquareParser($payload);
        $payload = self::routeRoundParser($payload);
        $payload = self::routeTriangleParser($payload);
        $payload = self::routeBassaParser($payload);
        $payload = self::dropParser($payload);

        return $payload;
    }

    public static function timeParser($payload)
    {
        preg_match_all('/\[\d{1,2}h\d{1,2}\'[A-Z]{1,2}\d\]/', $payload, $matches);
        $occurrences = array_shift($matches);
        $replace = [];
        foreach ($occurrences as $occurrence) {
            preg_match('/\'[A-Z]{1,2}\d/', $occurrence, $class);

            $class = strtolower(ltrim(array_shift($class), '\''));
            preg_match('/\d{1,2}h\d{1,2}\'/', $occurrence, $content);
            $time = array_shift($content);

            $replace[] = '<span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white rounded '.$class.'">'.$time.'</span>';
        }

        return str_replace($occurrences, $replace, $payload);
    }

    public static function routeSquareParser($payload)
    {
        preg_match_all('/\[([a-zA-Z0-9 ]+)\]([a-zA-Z])/m', $payload, $matches);
        if (count($matches) < 2 || empty($matches[0]) || empty($matches[1]) || empty($matches[2])) {
            return $payload;
        }
        $replace = [];
        $occurrences = $matches[0];
        $contents = $matches[1];
        $types = $matches[2];
        for ($i = 0; $i < count($occurrences); $i++) {
            switch ($types[$i]) {
              case 'c':
                $replace[] = Signs::cai($contents[$i]);
              break;
              case 'g':
                $replace[] = Signs::rectYellow($contents[$i]);
                break;
            case 'b':
                $replace[] = Signs::rectBlue($contents[$i]);
                break;
            case 'v':
                $replace[] = Signs::rectGreen($contents[$i]);
                break;

              default:
               $replace[] = '<small>unable to parse</small>';
               break;
            }
        }

        return str_replace($occurrences, $replace, $payload);
    }

    public static function routeRoundParser($payload)
    {
        preg_match_all('/\(([a-zA-Z0-9 ]+)\)([a-z])/m', $payload, $matches);
        if (count($matches) < 2 || empty($matches[0]) || empty($matches[1]) || empty($matches[2])) {
            return $payload;
        }
        $replace = [];

        $occurrences = $matches[0];
        $contents = $matches[1];
        $types = $matches[2];
        for ($i = 0; $i < count($occurrences); $i++) {
            switch ($types[$i]) {
                case 'g':
                    $replace[] = Signs::roundYellow($contents[$i]);
                break;
                default:
                    $replace[] = '<small>unable to parse</small>';
                break;
            }
        }

        return str_replace($occurrences, $replace, $payload);
    }

    public static function dropParser($payload)
    {
        preg_match_all('/\(([0-9 ]+m)(D[\+\-])\)/m', $payload, $matches);
        if (count($matches) < 2 || empty($matches[0]) || empty($matches[1]) || empty($matches[2])) {
            return $payload;
        }
        $replace = [];

        $occurrences = $matches[0];
        $contents = $matches[1];
        $types = $matches[2];

        for ($i = 0; $i < count($occurrences); $i++) {
            switch ($types[$i]) {
                case 'D+':
                    $replace[] = Signs::dropPositive($contents[$i]);
                break;
                case 'D-':
                    $replace[] = Signs::dropNegative($contents[$i]);
                break;
                default:
                    $replace[] = '<small>unable to parse</small>';
                break;
            }
        }

        return str_replace($occurrences, $replace, $payload);
    }

    public static function routeTriangleParser($payload)
    {
        preg_match_all('/\/([a-zA-Z0-9 ]+)\\\\([a-z])/m', $payload, $matches);
        if (count($matches) < 2 || empty($matches[0]) || empty($matches[1]) || empty($matches[2])) {
            return $payload;
        }
        $replace = [];
        $occurrences = $matches[0];
        $contents = $matches[1];
        $types = $matches[2];

        for ($i = 0; $i < count($occurrences); $i++) {
            switch ($types[$i]) {
                case 'g':
                    $replace[] = Signs::triangleYellow($contents[$i]);
                break;
                default:
                    $replace[] = '<small>unable to parse</small>';
                break;
            }
        }

        return str_replace($occurrences, $replace, $payload);
    }

    public static function routeBassaParser($payload)
    {
        //preg_match_all('@[\\\]([a-zA-Z0-9 ]+)[//]([a-z])@m', $payload, $matches);
        preg_match_all('/\\\\([0-9]+)\/([a-zA-Z])/', $payload, $matches,PREG_SET_ORDER);
        if (empty($matches)) {
            return $payload;
        }
        $replace = [];
        $occurrences = [];
        $contents = [];
        $types = [];
        foreach ($matches as $match) {
            $occurrences[] = $match[0];
            $contents[] = $match[1];
            $types[] = $match[2];
        }
        for ($i = 0; $i < count($occurrences); $i++) {
            switch ($types[$i]) {
                case 'g':
                    $replace[] = Signs::bassaYellow($contents[$i]);
                break;
                default:
                    $replace[] = '<small>unable to parse</small>';
                break;
            }
        }

        return str_replace($occurrences, $replace, $payload);
    }
}
