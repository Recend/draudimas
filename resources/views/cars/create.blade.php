@extends('layouts.main')
@section('content')
<form class="form-control" action="{{ route('cars.store') }}" method="post">
    @csrf
    <div class="mb-3">
        <label class="form-label">Registracijos numeris:</label>
        <input class="form-control" type="text" name="reg_number">
    </div>
    <div  class="mb-3">
        <label class="form-label">Markė:</label>
        <input class="form-control" type="text" name="brand">
    </div>
  <div  class="mb-3">
        <label class="form-label">Modelis:</label>
        <input class="form-control" type="text" name="model">
    </div>
  <div  class="mb-3">
        <label class="form-label">Savininkas:</label>
        <input class="form-control" type="number" name="owner_id">
    </div>
    <button class="btn btn-primary mt-3">Pridėti</button>
    <a href="{{route('cars.index')}}" class="btn btn-primary mt-3 float-end">Atgal</a>
</form>
@endsection