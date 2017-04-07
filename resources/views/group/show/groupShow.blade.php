@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <h2>Group: {{ $group->name }} </h2>

            <div class="panel panel-default">
                <div class="panel-heading">Resources</div>
                <div class="panel-body">
                    <ul>
                        <li>
                            <span class="fa fa-gears"></span> Scrap: <strong>{{ $group->scrap }}</strong>
                        </li>
                        <li>
                            <span class="fa fa-cutlery"></span> Food: <strong>{{ $group->food }}</strong>
                        </li>
                        <li>
                            <span class="fa fa-tint"></span> Water: <strong>{{ $group->water }}</strong>
                        </li>
                        <li>
                            <span class="fa fa-tachometer"></span> Fuel: <strong>{{ $group->fuel }}</strong>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="panel panel-default">
                <div class="panel-heading">Characters</div>

                <div class="panel-body">

                    @forelse ($group->characters as $character)
                        <p><a href="{{ route('characters.show', $character->id) }}">
                            {{ $character->firstname }}
                            {{ isset($character->nickname) ? '"'.$character->nickname.'"' : '' }}
                            {{ $character->lastname }}
                        </a> <span class="badge">{{ $character->hp }}</span></p>
                    @empty
                        <p>No characters</p>
                    @endforelse

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
