@extends('dashboard.master')
@section('content')
    <h6>Editar Publicación</h6>
    @include ('dashboard.structure.validation-error')
    <form action="{{ route('post.update', $post -> id) }}" method="POST">
        @method('PUT')
        @include('dashboard.post.form')
    </form>
@endsection