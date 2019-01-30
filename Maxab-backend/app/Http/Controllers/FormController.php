<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        // TODO: perform calculations
        $weekDays = FormController::mapdates($request->input('weekDays'));

        $scheduledSessions = FormController::schedule($weekDays);
        // {{ \Carbon\Carbon::parse($user->from_date)->format('d/m/Y')}}
        
        $data = array(
            'startDate' =>date('l jS \of F Y', strtotime($request->input('startDate'))),
            'weekDays' => $weekDays,
            'sessionsPerChapter' => $request->input('sessionsPerChapter'),
            'success' => 'Calculations successful',
            'scheduledSessions' => $scheduledSessions,
            'sessionsCount' => ((int)$request->input('sessionsPerChapter'))*30,
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
            $weekDaysMap = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
            return $weekDaysMap[(int) $day];
        }, $weekDaysArray);
    }

    /**
     * Create schedule for student
     * 
     * @param array $weekDaysArray
     * @return array 
     */
    private static function schedule($weekDaysArray){
        return [array('number' => 1, 'date' => date('l jS \of F Y'), 'chapter' => '1'),
        array('number' => 2, 'date' => date('l jS \of F Y'), 'chapter' => '2')];
    }
    
}