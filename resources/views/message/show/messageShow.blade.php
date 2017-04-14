@extends('layouts.app')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-md-offset-2">

                <h2>{{ $message->subject }}</h2>

                <div class="panel panel-default">
                    <div class="panel-body">
                        {{ $message->message }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
