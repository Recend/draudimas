@extends('layouts.main')
@section('content')
<form class="form-control" action="{{ route('cars.update', $car->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Registracijos numeris:</label>
        <input class="form-control @if($errors->has('reg_number')) is-invalid @endif " type="text" name="reg_number" value="{{$car->reg_number}}">
        @if($errors->has('reg_number'))
            @foreach($errors->get('reg_number') as $error)
                {{ $error }} <br>
            @endforeach
        @endif
    </div>
    <div>
        <label class="form-label">Markė:</label>
        <input class="form-control @if($errors->has('brand')) is-invalid @endif  " type="text" name="brand" value="{{$car->brand}}">
        @if($errors->has('brand'))
            @foreach($errors->get('brand') as $error)
                {{ $error }} <br>
            @endforeach
        @endif
    </div>
    <div>
        <label class="form-label">Modelis:</label>
        <input class="form-control @if($errors->has('model')) is-invalid @endif  " type="text" name="model" value="{{$car->model}}">
        @if($errors->has('model'))
            @foreach($errors->get('model') as $error)
                {{ $error }} <br>
            @endforeach
        @endif
    </div>
    <div>
        <label class="form-label">Savininkas:</label>
        <select class="form-control" name="owner_id">
            @foreach($owners as $owner)
            <option @if($owner->id==$car->owner->id)? selected @endif value="{{$owner->id}}">{{$owner->name}}</option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-success mt-3">Atnaujinti</button>
    <a href="{{route('cars.index')}}" class="btn btn-primary mt-3 float-end">Atgal</a>
</form>
@endsection
