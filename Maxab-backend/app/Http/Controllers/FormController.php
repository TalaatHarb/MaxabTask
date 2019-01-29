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
    public function submit()
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
            'success' => 'Calculations successful'
        );
        
        return redirect("{{url('/results')}}")->with($data);
    }

    
}