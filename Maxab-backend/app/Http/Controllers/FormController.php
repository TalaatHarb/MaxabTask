<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use DatePeriod;
use DateInterval;

class FormController extends Controller
{
    /**
     * Submit form controller.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function submit(Request $request)
    {
        // TODO: Add better validation
        $this->validate($request, [
            'startDate' => 'required',
            'weekDays' => 'required',
            'sessionsPerChapter' => 'required',
        ]);

        
        $startDate = new DateTime($request->input('startDate'));
        $weekDaysArray = $request->input('weekDays');
        $weekDays = FormController::mapdates($weekDaysArray);
        $sessionsPerChapter = $request->input('sessionsPerChapter');


        // TODO: perform calculations
        $scheduledSessions = FormController::schedule($startDate, $weekDaysArray, $sessionsPerChapter);

        // Possible improvement for readability: use Carbon
        // {{ \Carbon\Carbon::parse($user->from_date)->format('d/m/Y')}}
        
        $data = array(
            'startDate' => $startDate->format('l, jS \of F Y'),
            'weekDays' => $weekDays,
            'sessionsPerChapter' => $sessionsPerChapter,
            'scheduledSessions' => $scheduledSessions,
        );
        
        return view("pages.results")->with($data);
    }
 
    // TODO: Move private static functions to a provider

    /**
     * Map dates number to thier appropriate name
     * 
     * @param array $weekDaysArray
     * @return array 
     */
    private static function mapdates($weekDaysArray){
        
        return array_map(
            function($day) {
                static $weekDaysMap = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
            return $weekDaysMap[(int) $day];
        }, $weekDaysArray);
    }

    /**
     * Create schedule for student
     * 
     * @param date $startDate
     * @param array $weekDays
     * @param
     * @return array 
     */
    private static function schedule($startDate, $weekDays, $sessionsPerChapter){
        $sessionsCount = ((int)$sessionsPerChapter)*30;
        $scheduledSessions = [];
        $i = 0;
        $weekDaysArray = FormController::mapdates($weekDays);
        
        // TODO: Split solution by filtering to multiple functions
        $dates = array_slice(
                    array_filter(
                    iterator_to_array(
                        new DatePeriod(
                            $startDate,
                            new DateInterval('P1D'),
                            (new DateTime(
                                $startDate->format('d-m-Y')
                                ))->modify(
                                    ' + ' . ((int)($sessionsCount * 7 / count($weekDays) + 7)) . ' days'))), 
                                    function ($date) use($weekDaysArray){
                                        foreach($weekDaysArray as $day){
                                            if($date->format('l') == $day){
                                                return true;
                                            }
                                        }
                                        return false;
                                    })
                                    , 0, $sessionsCount);

        while($i < $sessionsCount){
            array_push($scheduledSessions, 
            array('number' => ($i+1),
             'date' => $dates[$i]->format('l, jS \of F Y'),
             'chapter' =>((int) ($i / $sessionsPerChapter + 1))));
             $i++;
        }
        return $scheduledSessions;
    }
    
}