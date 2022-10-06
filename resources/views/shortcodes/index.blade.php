@extends('layouts.app')
@section('content')
    <div class="container">

        <a class="btn btn-warning float-end" href="{{ route('cars.index') }}">Automobiliai</a>
        <a class="btn btn-warning float-end" href="{{ route('owners.index') }}">Savininkai</a>
        <a class="btn btn-primary" href="{{ route('short_codes.create') }}">Prideti trumpinį</a>
        <table class="table table-striped">
            <thead>

            <tr>
                <th>Shortcode</th>
                <th>Replace</th>
            </tr>
            </thead>
            <tbody>
            @foreach($shortcodes as $shortcode)
                <tr>
                    <td>{{ $shortcode->shortcode }}</td>
                    <td>{{ $shortcode->replace  }}</td>

                    <td><a class="btn btn-success" href="{{ route('short_codes.edit', $shortcode->id) }}">Koreguoti</a> </td>
                    <td>
                        <form action="{{ route('short_codes.destroy', $shortcode->id) }}" method="post">
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
