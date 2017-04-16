@extends('layouts.slim')

@section('main')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Characters</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
        <table class="table table-striped table-hover">
            <tr>
                <th>Name</th>
                <th>Health</th>
                <th>Level</th>
            </tr>
            @foreach ($characters as $character)
            <tr onclick="window.open('{{ route('characters.show', $character->id) }}', '_self')">
                <td>
                    <a href="{{ route('characters.show', $character->id) }}">
                        {{ $character->fullname }}
                    </a>
                </td>
                <td>
                    <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-danger" style="width: {{ $character->hp/ $character->max_Hp * 100 }}%;">
                        </div>
                    </div>
                </td>
                <td><span class="badge bg-blue">{{ $character->level }}</span></td>
            </tr>
            @endforeach
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->

@endsection
