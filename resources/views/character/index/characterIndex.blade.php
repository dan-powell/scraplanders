@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Characters</div>

                <div class="panel-body">

                    @forelse ($characters as $character)
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
