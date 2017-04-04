@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <h2>Vehicle: {{ $vehicle->name }} </h2>

            <div class="panel panel-default">
                <div class="panel-heading">Chassis: <strong>{{ $vehicle->chassis->name }}</strong></div>
                <div class="panel-body">
                    <ul>
                        <li>
                            Weight: <strong></strong>
                        </li>
                        <li>
                            Armour: <strong>{{ $vehicle->chassis->armour }}</strong>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Power Plant: <strong>{{ $vehicle->plant->name }}</strong></div>
                <div class="panel-body">
                    <ul>
                        <li>
                            Torque: <strong>{{ $vehicle->plant->torque }} Nm</strong>
                        </li>
                        <li>
                            Horsepower: <strong>{{ $vehicle->plant->horsepower }} HP</strong>
                        </li>
                        <li>
                            Fuel Consumption: <strong>~{{ $vehicle->plant->consumption }} Litres/min</strong>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
