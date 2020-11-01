@csrf

@if ($project->imagen)
    <img class="card-img-top mb-2"
        src="/storage/{{ $project->imagen }}"
        alt="{{ $project->title }}"
    >
@endif

<div id="preview"></div>

<div class="custom-file mb-3">
    <input name="imagen" type="file" class="custom-file-input" id="file" lang="es">
    <label class="custom-file-label" for="file">Seleccionar Archivo</label>
</div>

<div class="form-group">
    <label for="nombre">Nombre del Proyecto</label>
    <input 
        type="text" 
        name="nombre" 
        id="nombre" 
        placeholder="Ingresar el nombre del proyecto" 
        class="form-control border-0 bg-light shadow-sm"
        value="{{old('nombre', $project->nombre)}}">
</div>

<div class="form-group">
    <label for="categoria">Categoria</label>
    <select name="category_id" id="categoria" class="form-control shadow-sm border-0 bg-light">
        <option value="">Seleccione una Categoría</option>
        @forelse ($categories as $id => $nombre)
            <option 
                value="{{ $id }}" 
                @if($id == old('category_id', $project->category_id)) selected @endif > 
                {{ $nombre }}
            </option>
        @empty
            <option value="">No existen Categorías aun...</option>
        @endforelse
    </select>
</div>

<div class="form-group">
    <label for="descripcion">Descripción</label>
    <textarea 
        name="descripcion" 
        id="descripcion" 
        rows="10" 
        placeholder="Ingresar la descripón del proyecto"
        class="form-control border-0 bg-light shadow-sm"
    >{{old('descripcion', $project->descripcion)}}</textarea>
</div>

<button type="submit" class="btn btn-primary btn-lg btn-block">{{$btnText}}</button>
<a href="{{ route('projects.index') }}" class="btn btn-link btn-block">Regresar</a>

