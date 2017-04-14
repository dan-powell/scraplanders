@extends('layouts.app')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-7 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Messages</div>

                <div class="panel-body">

                    @forelse ($messages as $message)
                        <p><a href="{{ route('messages.show', $message->id) }}">{{ $message->subject }}</a></p>
                    @empty
                        <p>No messages</p>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
