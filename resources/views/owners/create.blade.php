@extends('layouts.main')
@section('content')
<form class="form-control" action="{{ route('owners.store') }}" method="post">
    @csrf
    <div class="mb-3">
        <label class="form-label">Vardas:</label>
        <input class="form-control @if($errors->has('name')) is-invalid @endif" type="text" name="name">
        @if($errors->has('name'))
            @foreach($errors->get('name') as $error)
                {{ $error }} <br>
            @endforeach
        @endif
    </div>
    <div  class="mb-3">
        <label class="form-label">Pavardė:</label>
        <input class="form-control @if($errors->has('surname')) is-invalid @endif" type="text" name="surname">
        @if($errors->has('surname'))
            @foreach($errors->get('surname') as $error)
                {{ $error }} <br>
            @endforeach
        @endif
    </div>
    <div  class="mb-3">
        <label class="form-label">El paštas</label>
        <input class="form-control @if($errors->has('email')) is-invalid @endif" type="text" name="email">
        @if($errors->has('email'))
            @foreach($errors->get('email') as $error)
                {{ $error }} <br>
            @endforeach
        @endif
    </div>
    <button class="btn btn-primary mt-3">Pridėti</button>
    <a href="{{route('owners.index')}}" class="btn btn-primary mt-3 float-end">Atgal</a>
</form>
@endsection
