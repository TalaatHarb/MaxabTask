
<div 
    class="jumbotron p-2 mb-0">
    <div class="text-center">
        <div class="card">
            <div class="card-header">
                <h3 class="font-weight-bold">Student data</h3>
            </div>
            <div class="card-body books-background">
                <div class="row">
                    <div class="col-md-10 text-justify">
                        <h5 class="text-primary">Starting date: {{$startDate}}</h5>
                        <h5 class="text-success">Number of sessions per week: {{count($weekDays)}}</h5>
                        <h5 class="text-primary">Choosen days: 
                            @foreach ($weekDays as $day)
                                <span class="text-light badge badge-primary">{{ $day }}</span>
                            @endforeach
                        </h5>
                        <h5 class="text-success">Sessions per chapter: {{$sessionsPerChapter}}</h5>
                        <h5 class="text-primary">Total number of sessions: {{count($scheduledSessions)}}</h5>
                    </div>
                <div class="col-md-2">
                    <img src="{{asset('images/books003.jpg')}}" alt="books" class="rounded">
                </div>
                </div>
                
            </div>
        </div>        
    </div>
    <br>
    <div class="text-center">
        <div class="card">
            <div class="card-header">
                <h3 class="font-weight-bold">Student schedule</h3>
            </div>
            <div class="card-body text-justify books-background">
                <div class="container">
		            <table class="table table-striped table-hover table-bordered">
			            <thead>
                            <th>Session No.</th>
                            <th class="text-center">Week day</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Chapter</th>
			            </thead>
			            <tbody>
			                @foreach ($scheduledSessions as $sSession)
                                <tr>
                                    <th>{{$sSession['number']}}</th>
                                    <th class="text-center">{{$sSession['weekDay']}}</th>
                                    <th class="text-center">{{$sSession['date']}}</th>
                                    <th class="text-center">{{$sSession['chapter']}}</th>
                                </tr>
                            @endforeach
                        </tbody>
		            </table>
            </div>
        </div>        
    </div>	
</div>