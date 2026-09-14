<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\View\View;
use App\Models\Activity;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\Collection;
use chillerlan\QRCode\{QRCode, QROptions};


class IcsController extends Controller
{

    /**
     * Parsed from format .now()  to ICS format
     * YYYY-MM-DD HH-MM-SS -> YYYYMMDDTHHMMSSZ
     * 2026-09-04 11:09:48 -> 20260904T110948Z
    */
    public function parse_ics_time(string $str_time)
    {
        $year = substr($str_time, 0, 4);
        $month = substr($str_time, 5, 2);
        $day = substr($str_time, 8, 2);
        $hour = substr($str_time, 11, 2);
        $minute = substr($str_time, 14, 2);
        $second = substr($str_time, 17, 2);

        $ics_time = $year.$month.$day."T".$hour.$minute.$second."Z";

        return $ics_time;
    }


    public function generate_ics_contents(Request $request): Response
    {
        $classIds = $request->input('class_ids', []);

        // fetches activities of selected class ids
        $activities = Activity::whereHas(
            'schoolClasses',
            function ($query) use ($classIds) {
                $query->whereIn('school_classes.id', $classIds);
            })->get();

        $contents = [
            "BEGIN:VCALENDAR",
            "VERSION:2.0",
            "PRODID:-//Firda Planning//Planning Dashboard v2.0//NL",
            "CALSCALE:GREGORIAN",
            "METHOD:PUBLISH",
        ];
        foreach ($activities as $activity){
            if ($activity) {
                $parsed_dt_start = IcsController::parse_ics_time(
                    $activity->dt_start
                );

                $parsed_dt_end = IcsController::parse_ics_time(
                    $activity->dt_end
                );

                array_push(
                    $contents,
                    "BEGIN:VEVENT",
                    "UID:".uniqid()."@firda-planning.com",
                    "DTSTAMP:".now()->utc()->format('Ymd\THis\Z'),
                    "DTSTART:$parsed_dt_start",
                    "DTEND:$parsed_dt_end",
                    "SUMMARY:$activity->summary",
                    "LOCATION:$activity->location",
                    "END:VEVENT",
                );
            }
        };

        $contents[] = "END:VCALENDAR";

        $ics_content = implode("\r\n", $contents);


        return response($ics_content, 200, [
            'Content-Type' => 'text/calendar; charset=utf-8',
            'Content-Disposition' => 'inline; filename="event.ics"',
        ]);
    }


    public function handle_request(Request $request):  Response | View
    {

        // handle no classes selected | redirect
        if (empty($request->input('school_classes'))) {
        //    return back()->with('error', 'Selecteer minimaal één klas.');
        }

        // -- Fetching Activities -- \\
        //
        // fetch selected classes
        $classes_validation= $request->validate([
            'school_classes'   => ['required', 'array'],
            'school_classes.*' => ['integer', 'exists:school_classes,id'],
        ]);

        // contains id array [1,2,3,4]
        $selected_classes = $classes_validation['school_classes'];

        // fetch activities from selected classes
        $activities = Activity::whereHas(
            'schoolClasses',
            function ($query) use ($selected_classes) {
                $query->whereIn('school_classes.id', $selected_classes);
            })->get();


        // handle qr code
        if (!empty($request->input('qr-code'))) {

            $httpsUrl = route('calendar.subscribe', ['class_ids' => $selected_classes]);
            $webcalUrl = preg_replace('/^https?:\/\//i', 'webcal://', $httpsUrl);

            $options = new QROptions;
            $qr_code = (new QRCode($options))->render($httpsUrl);

            return view("qrcode", compact('qr_code','webcalUrl', 'httpsUrl'));
        }

    }
}
