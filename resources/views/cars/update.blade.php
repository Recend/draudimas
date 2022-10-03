@extends('layouts.main')
@section('content')
<form class="form-control" action="{{ route('cars.update', $car->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Registracijos numeris:</label>
        <input class="form-control" type="text" name="reg_number" value="{{$car->reg_number}}">
    </div>
    <div>
        <label class="form-label">Markė:</label>
        <input class="form-control" type="text" name="brand" value="{{$car->brand}}">
    </div>
    <div>
        <label class="form-label">Modelis:</label>
        <input class="form-control" type="text" name="model" value="{{$car->model}}">
    </div>
    <div>
        <label class="form-label">Savininkas:</label>
        <input class="form-control" type="number" name="owner_id" value="{{$car->owner_id}}">
    </div>
    <button class="btn btn-success mt-3">Atnaujinti</button>
    <a href="{{route('cars.index')}}" class="btn btn-primary mt-3 float-end">Atgal</a>
</form>
@endsection
