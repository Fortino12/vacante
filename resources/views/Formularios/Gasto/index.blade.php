@extends('layouts.app')

@section('content')

    <h1></h1>
    <div class="table-responsive-sm">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th colspan="2" class="text-center">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach()
                    <tr>
                    <th scope="row">1</th>
                    <td></td>
                    <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection