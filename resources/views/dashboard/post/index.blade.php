@extends('dashboard.master')
@section('content')
    <h6>Listar publicaciones</h6>
    
<a class="btn btn-success mt-3 mb-3" href="{{route('post.create')}}"> Crear</a>
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Estado publicación</th>
            <th>Creación</th>
            <th>Actualización</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($posts as $post)
        <tr>
            <td scope="row">{{ $post->id }}</td>
            <td>{{ $post->publication }}</td>
            <td>{{ $post->state}}</td>
            <td>{{ $post->created_at->format('d-m-Y')}}</td>
            <td>{{ $post->updated_at->format('d-m-Y')}}</td>
            <td>
                <a  href="{{route('post.show',$post->id)}}" class="btn btn-primary" >Ver </a>
                <a class="btn btn-primary" href="{{route('post.edit',$post->id)}}" role="button">Actualizar </a>
               <button data-toggle="modal" data-target="#deleteModal" data-id="{{ $post->id }}"  class="btn btn-danger"  >Eliminar</button>
               
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
   

@endsection

{{ $posts->links() }}

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="deleteModalLabel"></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label class="text-muted">¿Está seguro que deseas eliminar el post seleccionado?</label>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                    Cerrar
                </button>

                <form id="formDelete" method="POST" action="{{ route('post.destroy', 0) }}"
                    data-action="{{ route('post.destroy', 0) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">Confirmar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    window.onload = function() {
        $('#deleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            action = $('#formDelete').attr('data-action').slice(0, -1)
            action += id
            $('#formDelete').attr('action',action)
            var modal = $(this)
            modal.find('.modal-title').text('Va a eliminar el: '+ id)
        });
    };
</script>