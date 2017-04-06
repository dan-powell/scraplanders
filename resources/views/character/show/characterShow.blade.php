@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <h2>
                {{ $character->firstname }}
                {{ isset($character->nickname) ? '"'.$character->nickname.'"' : '' }}
                {{ $character->lastname }}
            </h2>

            <div class="panel panel-default">
                <div class="panel-heading"><strong>About</strong></div>
                <!-- List group -->
                <ul class="list-group">
                    <li class="list-group-item">Date of Birth: <strong>{{ $character->dob->format('D jS F, Y') }}</strong></li>
                    <li class="list-group-item">Age: <strong>{{ $character->dob->diffInYears(Carbon\Carbon::now(), false) }}</strong></li>
                </ul>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><strong>Stats</strong></div>
                <div class="panel-body">
                    <div class="row">
                        @foreach($character->stats as $stat)
                        <div class="col-xs-4 text-right"><strong>{{ $stat['name'] }}</strong></div>
                        <div class="col-xs-8">
                            <div class="progress">
                                <div class="progress-bar"
                                    role="progressbar"
                                    aria-valuenow="{{ $stat['value'] }}"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                    style="width: {{ $stat['value']/$max_stat*100 }}%;">
                                    {{ $stat['value'] }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>


            <div class="panel panel-default">
                <div class="panel-heading"><strong>Experience</strong></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-3 text-right">
                            Experience Points:
                        </div>
                        <div class="col-xs-1">
                            <strong>{{ $character->experience }}</strong>
                        </div>
                        <div class="col-xs-3 text-right">
                            Level:
                        </div>
                        <div class="col-xs-1">
                            <strong>{{ $character->level }}</strong>
                        </div>
                        <div class="col-xs-3 text-right">
                            Exp reach next lvl:
                        </div>
                        <div class="col-xs-1">
                            <strong>{{ $character->nextLevelExperience }}</strong>
                        </div>
                    </div>
                    @foreach($levels as $key => $level)
                        <div class="row">
                            <div class="col-xs-3 text-right">
                                Level {{ $key }}:
                            </div>
                            <div class="col-xs-3">
                                <strong>{{ $level }} @if($key == $character->level){{ 'Current' }} @endif</strong>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><strong>Health</strong></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-4 text-right"><strong>HP</strong></div>
                        <div class="col-xs-8">
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger"
                                    role="progressbar"
                                    aria-valuenow="{{ $stat['value'] }}"
                                    aria-valuemin="0"
                                    aria-valuemax="{{ $character->max_Hp }}"
                                    style="width: {{ $character->hp/ $character->max_Hp * 100 }}%;">
                                    {{ $character->hp }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3 text-right">
                            Max HP:
                        </div>
                        <div class="col-xs-3">
                            <strong>{{ $character->max_Hp }}</strong>
                        </div>
                        <div class="col-xs-3 text-right">
                            HP:
                        </div>
                        <div class="col-xs-3">
                            <strong>{{ $character->hp }}</strong>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
