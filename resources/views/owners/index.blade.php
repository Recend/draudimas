@extends('layouts.app')
@section('content')
    <div class="container">
<a class="btn btn-primary" href="{{ route('owners.create') }}">Prideti savininka</a>
<a class="btn btn-warning float-end" href="{{ route('cars.index') }}">Automobiliai</a>

<table class="table table-striped">
    <thead>

    <tr>
        <th>Vardas</th>
        <th>Pavardė</th>
        <th>El paštas</th>
        <th>Priklausantys automobiliai</th>

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
            <td><a class="btn btn-success" href="{{ route('owners.edit', $owner->id) }}">Koreguoti</a> </td>
            <td>
                <form action="{{ route('owners.destroy', $owner->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Ištrinti</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
    </div>
@endsection
