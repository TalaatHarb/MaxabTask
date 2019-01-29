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
        // $this->validate($request, [
        //     'title' => 'required',
        //     'description' => 'required',
        //     'status' => 'required',
        //     'contactphone' => 'required',
        //     'startdate' => 'required',
        //     'enddate'
        // ]);
        $data = array(
            'weekDays' => $request->input('weekDays'),
            'success' => 'Calculations successful'
        );
        
        return view("pages.results")->with($data);
    }

    
}