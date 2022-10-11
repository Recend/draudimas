@extends('layouts.app')
@section('content')
    <div class="container">
@can('create')
<a class="btn btn-primary" href="{{ route('cars.create') }}">{{ __("Add car") }}</a>
        @endcan
<a class="btn btn-warning float-end" href="{{ route('shortcodes.index') }}">Trumpiniai</a>


<table class="table table-striped">
    <thead>
    <tr>
        <th>{{ __("Car photos") }}</th>
        <th>{{ __("Registration Number") }}</th>
        <th>{{ __("Brand") }}</th>
        <th>{{ __("Model") }}</th>
        <th>{{ __("Owner") }}</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($cars as $car)
        <tr>
            <td>
                    @if(!$car->image)
                        <img src="{{ route('image.cars',$car->image=='ghost.png') }}" style="width:150px">
                @else
               <a href="{{ route('cars.show', $car->id) }}"><img src="{{ route('image.cars',$car->image) }}" style="width:150px"></a>
                    @endif
            </td>
            <td>{{ $car->reg_number }}</td>
            <td>{{ $car->brand }}</td>
            <td>{{ $car->model }}</td>
            <td>{{ $car->owner->name }} {{$car->owner->surname}}</td>
            @can('update', $car)
            <td><a class="btn btn-success" href="{{ route('cars.edit', $car->id) }}">{{ __("Edit") }}</a> </td>
            @endcan
            <td>
                 @can('delete', $car)
                <form action="{{ route('cars.destroy', $car->id) }}" method="post">
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
