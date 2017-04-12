@extends('layouts.app')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-7 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Vehicles</div>

                <div class="panel-body">

                    @forelse ($vehicles as $vehicle)
                        <p><a href="{{ route('vehicles.show', $vehicle->id) }}">{{ $vehicle->name }}</a> | {{ $vehicle->chassis->name }} | {{ $vehicle->plant->name }}</p>
                    @empty
                        <p>No units</p>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
