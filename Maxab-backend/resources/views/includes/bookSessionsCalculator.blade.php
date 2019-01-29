<div 
    class="jumbotron p-2 mb-0" 
    style="background-image: url('{{asset('images/books001.jpg')}}');
    background-size: cover;
    background-color: rgba(255,255,255,0.9);
    background-blend-mode: lighten;"
    >
    <h3>Book sessions calculator</h3>
    <br>
		<div class="row">
			<div class="col-md-4">
                <label class="btn btn-success btn-block">How it works?</label>
				<p>A student is required to finish a book of thirty chapters, he is allowed to
                        choose when he starts(Starting date), days he will be attending every 
                        week( Week days for sessions) and the number of sessions for each chapter</p>
                <img src="{{asset('images/books002.jpg')}}" alt="books" style="width: 100%;
                opacity: 0.5;" class="rounded">
			</div>
			<div class="col-md-8">
                    {!! Form::open(['action' => 'FormController@submit', 'method', 'POST']) !!}
                    <div class="form-group">
                        {{Form::Label('startDate', 'Starting date', ['class' => 'font-weight-bold'])}}
                        {{Form::date('startDate', '', ['class' => 'form-control', 'placeholder' => 'Starting Date'])}}
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Week days for sessions</label>
                        <label class="checkbox-container">Saturday
                            <input name="weekDays[0]" value="0" type="checkbox" checked>
                            <span class="checkmark"></span>
                        </label>
                        <label class="checkbox-container">Sunday
                            <input name="weekDays[1]" value="1" type="checkbox" checked>
                            <span class="checkmark"></span>
                        </label>
                        <label class="checkbox-container">Monday
                            <input name="weekDays[2]" value="2" type="checkbox" checked>
                            <span class="checkmark"></span>
                        </label>
                        <label class="checkbox-container">Tuesday
                            <input name="weekDays[3]" value="3" type="checkbox" checked>
                            <span class="checkmark"></span>
                        </label>
                        <label class="checkbox-container">Wednesday
                            <input name="weekDays[4]" value="4" type="checkbox" checked>
                            <span class="checkmark"></span>
                        </label>
                        <label class="checkbox-container">Thursday
                            <input name="weekDays[5]" value="5" type="checkbox" checked>
                            <span class="checkmark"></span>
                        </label>
                        <label class="checkbox-container">Friday
                            <input name="weekDays[6]" value="6" type="checkbox" checked>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="form-group">
                            {{Form::Label('sessionsPerChapter', 'Sessions per chapter', ['class' => 'font-weight-bold'])}}
                            {{Form::text('sessionsPerChapter', '', ['class' => 'form-control', 'placeholder' => 'Sessions per chapter'])}}    
                    </div> 
                    {{Form::submit('Calculate', ['class'=>'btn btn-primary btn-block'])}}
                {!! Form::close() !!}
			</div>
        </div>
        <div style="height: 40px"></div>
	</div>