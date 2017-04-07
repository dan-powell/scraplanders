@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Groups</div>

                <div class="panel-body">

                    @forelse ($groups as $group)
                        <p><a href="{{ route('group.show', $group->id) }}">{{ $group->name }}</a></p>
                    @empty
                        <p>No groups</p>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
