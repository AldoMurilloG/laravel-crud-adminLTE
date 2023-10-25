<div class="card mb-5">
    <form action="{{ $producto->id ? route('producto.update', $producto) : route('producto.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($producto->id)
            @method('PUT')
        @endif

        <div class="card-body">

            {{-- @if ($post->id) --}}
            <div class="mb-3 row">
                <img src="{{ $producto->imagen ?? 'https://via.placeholder.com/1024'}}" alt="{{ $producto->nombre }}" id="image_preview" class="img-fluid" style="object-fit: cover; object-position: center; height: 420px; width: 100%;">
            </div>
            {{-- @endif --}}

            <div class="mb-3 row">
                <label for="imagen" class="col-sm-4 col-form-label"> * Imagen </label>
                <div class="col-sm-8">
                    <input class="form-control @error('imagen') is-invalid @enderror" type="file" id="imagen" name="imagen" accept="image/*">
                    @error('imagen')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="nombre" class="col-sm-4 col-form-label"> * Nombre </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre', optional($producto)->nombre) }}">
                    @error('nombre')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="descripcion" class="col-sm-4 col-form-label"> * Descripción </label>
                <div class="col-sm-8">
                    <textarea class="form-control @error('body') is-invalid @enderror" id="descripcion" name="descripcion" rows="10">{{ old('descripcion', optional($producto)->descripcion) }}</textarea>
                    @error('body')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="precio" class="col-sm-4 col-form-label"> * Precio </label>
                <div class="col-sm-8">
                    <input type="number" class="form-control @error('precio') is-invalid @enderror" id="precio" name="precio" value="{{ old('precio', optional($producto)->precio) }}">
                    @error('precio')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="categoria" class="col-sm-4 col-form-label"> * Categoria </label>
                <div class="col-sm-8">
                    <select id="categoria_id" name="categoria_id" class="form-control">
                        @foreach ($categorias as $categoria)
                            <option {{ $producto->categoria_id && $producto->categoria_id == $categoria->id ? 'selected': ''}} value="{{ $categoria->id }}"> 
                                {{ $categoria->nombre }}
                            </option>
                        @endforeach
                    </select>                
{{--                     @error('categoria')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror --}}
                </div>
            </div>
        
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-success text-uppercase">
                {{ $producto->id ? 'Actualizar' : 'Crear' }}
            </button>
        </div>
    </form>

</div>

@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            const image = document.getElementById('imagen');
        
            image.addEventListener('change', (e) => {

                const input = e.target;
                const imagePreview = document.querySelector('#image_preview');
                
                if(!input.files.length) return

                file = input.files[0];
                objectURL = URL.createObjectURL(file);
                imagePreview.src = objectURL;
            });
        });
    </script>
@endpush