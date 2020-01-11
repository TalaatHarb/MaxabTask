<div 
    class="jumbotron p-2 mb-0 books-background">
    <h3>Book sessions calculator</h3>
    <br>
		<div class="row">
			<div class="col-md-4">
                <label class="btn btn-success btn-block">How it works?</label>
				<p>A student is required to finish a book of thirty chapters, he is allowed to
                        choose when he starts(Starting date), days he will be attending every 
                        week( Week days for sessions) and the number of sessions for each chapter</p>
                <img src="{{asset('images/books002.jpg')}}" alt="books" class="rounded">
			</div>
			<div class="col-md-8">
                    {!! Form::open(['action' => 'FormController@submit', 'method', 'POST']) !!}
                    <div class="form-group">
                        {{Form::Label('startDate', 'Starting date', ['class' => 'font-weight-bold'])}}
                        {{Form::date('startDate', old("startDate"), ['class' => 'form-control', 'placeholder' => 'Starting Date'])}}
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Week days for sessions</label>
                        @php($weekdays=[
                            0=>"Saturday",
                            1=>"Sunday",
                            2=>"Monday",
                            3=>"Tuesday",
                            4=>"Wednesday",
                            5=>"Thursday",
                            6=>"Friday",
                        ])
                        @for($i=0;$i<7;$i++)
                        <label class="checkbox-container">{{$weekdays[$i]}}
                            <input name="weekDays[{{$i}}]" value="{{$i}}" type="checkbox" {{(old("weekDays.".$i)??-1)==$i?"checked=\"checked\"":""}}>
                            <span class="checkmark"></span>
                        </label>
                        @endfor
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