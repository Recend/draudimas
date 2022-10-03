@extends('layouts.main')
@section('content')
<form class="form-control" action="{{ route('owners.update', $owner->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Vardas:</label>
        <input class="form-control" type="text" name="name" value="{{$owner->name}}">
    </div>
    <div>
        <label class="form-label">Pavardė:</label>
        <input class="form-control" type="text" name="surname" value="{{$owner->surname}}">
    </div>
    <div>
    <button class="btn btn-success mt-3 ">Atnaujinti</button>
        <a href="{{route('owners.index')}}" class="btn btn-primary mt-3 float-end">Atgal</a>
</form>

@endsection
