@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Setup Your Raid</div>

                <div class="panel-body">

                    {!! Form::open(['route' => 'action.raid.enact', 'class' => 'form']) !!}

                        <div class="form-group">
                            <label for="group">Target Group</label>
                            @if(isset($groups) && count($groups))
                                <select name="group" class="form-control">
                                    @foreach ($groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                            @else
                                <p>No groups</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="characters">Raiding Party</label>
                            @if(isset($characters) && count($characters))
                                <select multiple name="characters[]" id="characters" class="form-control">
                                    @foreach ($characters as $character)
                                        <option value="{{ $character->id }}">{{ $character->name }}</option>
                                    @endforeach
                                </select>
                            @else
                                <p>No characters</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Raid!</button>
                        </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
