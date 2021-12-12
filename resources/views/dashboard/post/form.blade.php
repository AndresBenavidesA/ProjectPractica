@csrf
@include('dashboard.structure.validation-error')

<div class="form-group ">


    <div class="col-md-6">
        <input id="publication" type="text" class="form-control" 
        name="publication" placeholder="Nombre publicación" value="{{ old('publication'), $post -> publication }}" required autocomplete="publication" autofocus>
        
        @error('name')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <br>
    <div class="form-group col-md-6">
        <select class="form-control" name="state" id="state">
            <option value="received">Publicado</option>
            <option value="in_evaluation">No publicado</option>
            <option value="accepted">En revisión</option>
        </select>
    </div>
    <br>

    <div class="form-group col-md-6">
        <textarea class="form-control" name="content" id="content" placeholder="Contenido de la publicación" value="{{ old('content'), $post -> publication }}">
        
        </textarea>
    </div>
</div>
<br>

<button class="btn btn-danger" href="{{URL::previous()}}">Cancelar</button>
<button type="submit" class="btn btn-success">Publicar</button>


@error('publication')
    <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
    </span>
    @enderror
    </div>
    </div>