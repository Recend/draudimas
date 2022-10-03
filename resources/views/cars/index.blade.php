@extends('layouts.app')
@section('content')
    <div class="container">
<a class="btn btn-primary" href="{{ route('cars.create') }}">Prideti automobilį</a>
<a class="btn btn-warning float-end" href="{{ route('owners.index') }}">Savininkai</a>
<table class="table table-striped">
    <thead>
    <tr>
        <th>Registracijos numeris</th>
        <th>Markė</th>
        <th>Modelis</th>
        <th>Savininkas</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($cars as $car)
        <tr>
            <td>{{ $car->reg_number }}</td>
            <td>{{ $car->brand }}</td>
            <td>{{ $car->model }}</td>
            <td>{{ $car->owner->name }} {{$car->owner->surname}}</td>
            <td><a class="btn btn-success" href="{{ route('cars.edit', $car->id) }}">Koreguoti</a> </td>
            <td>
                <form action="{{ route('cars.destroy', $car->id) }}" method="post">
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
