@extends('layouts.app')

@section('content')

    <h1></h1>

    <form method="post" action="">
        @csrf
        @method('put')
        
    </form>

@endsection