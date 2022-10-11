@extends('layouts.app')
@section('content')
    <div class="container">
        @method('PUT')
        <form class="form-control" enctype="multipart/form-data" action="{{route('images.store')}}" method="POST">
            @csrf
            <input type="hidden" name="car_id" value="{{ $car->id }}">
            <label class="form-label">Pridėti nuotrauką</label>
            <input type="file" name="image" class="form-control">
            <button class="btn btn-success">Pridėti</button>
        </form>


        <table class="table table-striped">
            <thead>
            <tr>
                <th>Automobilio nuotraukos</th>
            </tr>
            </thead>
            <tbody>

                <tr>
                    <td>
                        @foreach($images as $image)
                            @if($car->id==$image->car_id)
                        <img src=" {{ route('image.cars', $image->img) }}" style="width: 300px">;
                            @endif
                                <form action="{{ route('images.destroy', $image->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Ištrinti</button>
                                </form>
                        @endforeach
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
@endsection
