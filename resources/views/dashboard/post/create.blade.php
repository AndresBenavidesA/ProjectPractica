@extends('dashboard.master')
@section('content')
    <h6>Crear publicación</h6>
    <form action="{{ route('post.store') }}" method="post">
        @include('dashboard.post.form')
    </form>
@endsection