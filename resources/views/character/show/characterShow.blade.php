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
                <div class="panel-heading"><strong>Level {{ $character->level }}</strong></div>
                <!-- List group -->
                <ul class="list-group">
                    <li class="list-group-item">Date of Birth: <strong>{{ $character->dob->format(config('general.date_format')) }}</strong> (Age: <strong>{{ $character->age }}</strong>)</li>
                    <li class="list-group-item">Heft: {{ $character->heft }}</li>
                </ul>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><strong>Stats</strong></div>
                <div class="panel-body">
                    <div class="row">
                        @foreach($character->stats as $key => $stat)
                        <div class="col-xs-4 text-right">@lang('character.' . $key)</div>
                        <div class="col-xs-8">
                            <div class="progress">
                                <div class="progress-bar"
                                    role="progressbar"
                                    aria-valuenow="{{ $stat }}"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                    style="width: {{ $stat / $character->max_stat_value * 100 }}%; min-width: 10%;">
                                    {{ $stat }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><strong>Health</strong></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-2 text-right"><strong>HP</strong></div>
                        <div class="col-xs-7">
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
                        <div class="col-xs-3"><strong>{{ $character->max_Hp }} max</strong></div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><strong>Personality</strong></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-4 text-right">Alignment</div>
                        <div class="col-xs-8">
                            <strong>{{ $character->alignment }}</strong>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
