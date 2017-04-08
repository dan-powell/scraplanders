@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            @if($results['fight']['success'] > 0.5)
                <div class="alert alert-success" role="alert">Raid successful!</div>
            @elseif($results['fight']['success'] > -0.5)
                <div class="alert alert-warning" role="alert">Raid complete</div>
            @else
                <div class="alert alert-danger" role="alert">Raid failed</div>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading">Raid results</div>

                <!-- List group -->
                  <ul class="list-group">
                    <li class="list-group-item">Alerted Defenders: {{ count($results['infiltration']['defenders']) }} / {{ count($results['defenders']) }}</li>
                    <li class="list-group-item">Hits: {{ $results['fight']['hits'] }}</li>
                    <li class="list-group-item">Raider Hits: {{ $results['fight']['raider_hits'] }} vs Defender Hits: {{ $results['fight']['defender_hits'] }}</li>
                    <li class="list-group-item">Success: {{ $results['fight']['success'] }}</li>
                  </ul>

            </div>

            <h2>Raiders</h2>
            <textarea>
                {!! print_r($results['raiders']) !!}
            </textarea>

            <h2>Defenders</h2>
            <textarea>
                {!! print_r($results['defenders']) !!}
            </textarea>

        </div>
    </div>
</div>
@endsection
