@extends('layouts.app')
@section('content')
    <div class="container">
        @can('create')
<a class="btn btn-primary" href="{{ route('owners.create') }}">{{ __("Add owner") }}</a>
        @endcan

<table class="table table-striped">
    <thead>

    <tr>
        <th>{{ __("Name") }}</th>
        <th>{{ __("Surname") }}</th>
        <th>{{ __("Email") }}</th>
        <th>{{ __("Owned cars") }}</th>

    </tr>
    </thead>
    <tbody>
    @foreach($owners as $owner)
        <tr>
            <td>{{ $owner->name  }}</td>
            <td>{{ $owner->surname }}</td>
            <td>{{ $owner->email }}</td>
            <td>
          @foreach($owner->car as $car)
           {{ $car->brand." ".$car->model. ", " }}
       @endforeach
          </td>
            @can('edit')
            <td><a class="btn btn-success" href="{{ route('owners.edit', $owner->id) }}">{{ __("Edit") }}</a> </td>
            @endcan
            <td>
                @can('delete')
                <form action="{{ route('owners.destroy', $owner->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">{{ __("Delete") }}</button>
                </form>
                @endcan
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
    </div>
@endsection
