@extends('layouts.main')
@section('content')
<form class="form-control" action="{{ route('owners.store') }}" method="post">
    @csrf
    <div class="mb-3">
        <label class="form-label">Vardas:</label>
        <input class="form-control" type="text" name="name">
    </div>
    <div  class="mb-3">
        <label class="form-label">Pavardė:</label>
        <input class="form-control" type="text" name="surname">
    </div>
    <button class="btn btn-primary mt-3">Pridėti</button>
    <a href="{{route('owners.index')}}" class="btn btn-primary mt-3 float-end">Atgal</a>
</form>
@endsection
