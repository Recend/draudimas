@extends('layouts.main')
@section('content')
<form class="form-control" action="{{ route('cars.store') }}" method="post">
    @csrf
    <div class="mb-3">
        <label class="form-label">Registracijos numeris:</label>
        <input class="form-control @if ($errors->has('reg_number')) is-invalid @endif" type="text" name="reg_number" value="{{ old('reg_number') }}">
        @if($errors->has('reg_number'))
            @foreach($errors->get('reg_number') as $error)
        {{ $error }} <br>
            @endforeach
        @endif
    </div>
    <div  class="mb-3">
        <label class="form-label">Markė:</label>
        <input class="form-control @if ($errors->has('brand')) is-invalid @endif" type="text" name="brand" value="{{ old('brand') }}">
        @if($errors->has('brand'))
            @foreach($errors->get('brand') as $error)
                {{ $error }} <br>
            @endforeach
        @endif
    </div>
  <div  class="mb-3">
        <label class="form-label">Modelis:</label>
        <input class="form-control @if ($errors->has('model')) is-invalid @endif " type="text" name="model" value="{{ old('model') }}">
      @if($errors->has('model'))
          @foreach($errors->get('model') as $error)
              {{ $error }} <br>
          @endforeach
      @endif
    </div>
  <div  class="mb-3">
        <label class="form-label">Savininkas:</label>
     <select class="form-control" name="owner_id">
         @foreach($owners as $owner)
             <option value="{{$owner->id}}">{{$owner->name}}</option>
         @endforeach
     </select>
    </div>
    <button class="btn btn-primary mt-3">Pridėti</button>
    <a href="{{route('cars.index')}}" class="btn btn-primary mt-3 float-end">Atgal</a>
</form>
@endsection
