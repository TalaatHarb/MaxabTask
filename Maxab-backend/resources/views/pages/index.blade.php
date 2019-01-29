@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Test</h1>
</div>
<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div>We would love to hear from you</div>
			</div>
			<div class="col-md-8">
                    {!! Form::open(['action' => 'FormController@submit', 'method', 'POST']) !!}
                    <div class="form-group">
                        {{Form::Label('startDate', 'Starting date', ['class' => 'font-weight-bold'])}}
                        {{Form::date('startDate', '', ['class' => 'form-control', 'placeholder' => 'Starting Date'])}}
                    </div>
                    <div class="form-group">
                        {{Form::Label('weekDays', 'Week days for sessions', ['class' => 'font-weight-bold'])}}
                        <br>
                        {{Form::checkbox('weekDays[0]', '0')}}
                        <br>
                        {{Form::checkbox('weekDays[1]', '1')}}
                        <br>
                        {{Form::checkbox('weekDays[2]', '2')}}
                        <br>
                        {{Form::checkbox('weekDays[3]', '3')}}
                        <br>
                        {{Form::checkbox('weekDays[4]', '4')}}
                        <br>
                        {{Form::checkbox('weekDays[5]', '5')}}
                        <br>
                        {{Form::checkbox('weekDays[6]', '6')}}
                        <label class="btn btn-success active">
                                <input type="checkbox" autocomplete="off" checked>
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                    </div>
                    {{Form::submit('Calculate', ['class'=>'btn btn-primary btn-block'])}}
                {!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection