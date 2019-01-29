<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Submit form controller.
     *
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
        $scheduledSessions = [array('date' => date('d/m/Y'), 'chapter' => '1'),
                            array('date' => date('d/m/Y'), 'chapter' => '2')];
        
        $data = array(
            'startDate' => $request->input('startDate'),
            'weekDays' => $request->input('weekDays'),
            'sessionsPerChapter' => $request->input('sessionsPerChapter'),
            'success' => 'Calculations successful',
            // TODO: put results here to display
            'scheduledSessions' => $scheduledSessions
        );
        
        return view("pages.results")->with($data);
    }

    
}