@extends('layouts.backLayout')

@section('content')
  <div class="main-wrapper">
    <div class="section-title">
      <span>proyecto / editar</span>
    </div>
    <div class="main-body">
      <form class="form-project" action="/admin/proyecto_editar/{{ $project->id }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('patch') }}

        <div class="cajitas-form">
          <div class="input-div" id="title">
            <label class="form-label" for="title">Titulo</label>
            <input class="input-project" type="text" name="title" value="{{ $project->title }}" placeholder="{{ $project->title }}" autofocus>
          </div>
          <div class="input-div" id="year">
            <label class="form-label" for="year">Año</label>
            <select class="input-project" name="year">
              <option value="{{ old('year') }}">Seleccionar</option>
              @for ($i=2005; $i <= date("Y"); $i++)
                <option class="" value="{{$i}}"
                @if ($i == $project->year )
                  selected
                @endif
                >{{$i}}</option>
              @endfor
            </select>
          </div>
          <div class="input-div" id="client">
            <label class="form-label" for="client">Cliente</label>
            <input class="input-project" type="text" name="client" value="{{ $project->client }}" placeholder="{{ $project->client }}">
          </div>
        </div>

        <div class="cajitas-form">
          <label class="form-label">Etiquetas</label>
          <div class="tag-col">
            @foreach ($tags as $chunk)
              <div>
                @foreach ($chunk as $tag)
                  <div class="">
                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}" id="{{ $tag->es_name }}"
                    @if (isset($etiquetas))
                      @foreach ($etiquetas as $etiqueta)
                        @if ($tag->es_name === $etiqueta->es_name)
                          checked
                        @endif
                      @endforeach
                    @endif
                    >
                    <label for="{{ $tag->es_name }}" class="tag-text">{{ $tag->es_name }}</label>
                  </div>
                @endforeach
              </div>
            @endforeach
          </div>
        </div>

        <div class="cajitas-form">
          <div class="input-div" id="es_description">
            <label class="form-label" for="es_description">Descripción</label>
            <textarea class="input-textarea" name="es_description" value="{{ $project->es_description }}" >{{ $project->es_description }}</textarea>

          </div>
          <div class="input-div" id="en_description">
            <label class="form-label" for="en_description">Descripción EN</label>
            <textarea class="input-textarea" name="en_description" value="{{ $project->en_description }}" >{{ $project->en_description }}</textarea>
          </div>
          <div class="input-div" id="cat_description">
            <label class="form-label" for="cat_description">Descripción CAT</label>
            <textarea class="input-textarea" name="cat_description" value="{{ $project->cat_description }}" >{{ $project->cat_description }}</textarea>
          </div>
        </div>

        <div class="cajitas-form">
          <p class="form-label">Reemplazar Imagen Principal</p>
          <div class="flex">
            <img class="img-portada" src="{{ asset ( 'storage/' . $project->primary_img ) }}" alt="imagen Index">
            <label class="primary-img custom-upload" for="primary_img">
                <i class="fa fa-camera"></i>
              </label>
              <input class="upload-file" type="file" name="primary_img" id="primary_img" accept="image/*">
            {{-- <div class="input-div">
            </div> --}}
          </div>
        </div>

        <div class="cajitas-form">
          <label class="form-label" for="altImg[]">Otras imagenes</label>

          {{-- id para poder seleccionarlo desde js --}}
          <section id="altImages" class="flex">
            {{-- nombre de la vista --}}
            @include('/projects/altimages')
          </section>

          {{-- <div class="input-div">
            <input class="upload-file" type="file" name="altImg[]" multiple>
          </div> --}}
        </div>
      </div>

      <div class="input">
        <a href="/admin/proyectos" class="btn neg" type="cancel" name="button">Cancelar</a>
        <button class="btn" type="submit" name="button">Actualizar</button>
      </div>
    </form>
  </div>
</div>
@endsection

@section('js')
  <script src="{{ asset('js/backAjax.js') }}"></script>
@endsection
