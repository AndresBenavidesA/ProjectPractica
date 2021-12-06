
@csrf
<div class="form-group row">
    <label for="publication" class="col-md-4 col-form-label text-md-right">
        {{ __('Publicación') }}</label>

    <div class="col-md-6">
    <input id="publication" type="text" class="form-control @error('publication') is-invalid @enderror" 
    name="publication" id="publication" value="{{ old('publication') }}" required autocomplete="name" autofocus>

@error('publication')
    <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
    </span>
    @enderror
    </div>
    </div>