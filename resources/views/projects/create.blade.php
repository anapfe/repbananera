@extends('layouts.backLayout')

@section('content')
  <div class="main-wrapper">
    <div class="section-title">
      <span>proyecto / nuevo</span>
    </div>
    <div class="main-body">
      <form runat="server" class="form-project" action="/admin/proyectos/nuevo" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="cajitas-form">

          {{-- TITULO  --}}
          <div class="input-div {{ $errors->has('title') ? ' has-error' : '' }}" id="title">
            <label class="form-label" for="title">Titulo</label>
            <input class="input-project" type="text" name="title" value="{{ old('title') }}" autofocus>
            @if ($errors->has('title'))
              <span class="errors">
                <strong>{{ $errors->first('title') }}</strong>
              </span>
            @endif
          </div>
          {{-- AÑO --}}
          <div class="input-div {{ $errors->has('year') ? ' has-error' : '' }}" id="year">
            <label class="form-label" for="year">Año</label>
            <select class="input-project" name="year">
              <option>Seleccionar</option>
              @for ($i=date("Y"); $i >= 2002; $i--)
                @if (old("year") == $i)
                  <option class="" value="{{$i}}" selected>{{$i}}</option>
                @else
                  <option class="" value="{{$i}}">{{$i}}</option>
                @endif
              @endfor
            </select>
            @if ($errors->has('year'))
              <span class="errors">
                <strong>{{ $errors->first('year') }}</strong>
              </span>
            @endif
          </div>
          {{-- CLIENTE --}}
          <div class="input-div {{ $errors->has('client') ? ' has-error' : '' }}" id="client">
            <label class="form-label" for="client">Cliente</label>
            <input class="input-project" type="text" name="client" value="{{ old('client') }}">
            @if ($errors->has('client'))
              <span class="errors">
                <strong>{{ $errors->first('client') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="cajitas-form">
          {{-- descripción en español --}}
          <div class="input-div {{ $errors->has('es_description') ? ' has-error' : '' }}" id="es_description">
            <label class="form-label" for="es_description">Descripción español</label>
            <textarea class="input-textarea" name="es_description">{{ old('es_description') }}</textarea>
            @if ($errors->has('es_description'))
              <span class="errors">
                <strong>{{ $errors->first('es_description') }}</strong>
              </span>
            @endif
          </div>
          {{-- descripción en ingles  --}}
          <div class="input-div {{ $errors->has('en_description') ? ' has-error' : '' }}" id="en_description">
            <label class="form-label" for="en_description">Descripción inglés</label>
            <textarea class="input-textarea" name="en_description">{{ old('en_description') }}</textarea>
            @if ($errors->has('en_description'))
              <span class="errors">
                <strong>{{ $errors->first('en_description') }}</strong>
              </span>
            @endif
          </div>
          {{-- descripción en catalan --}}
          <div class="input-div {{ $errors->has('es_description') ? ' has-error' : '' }}" id="cat_description">
            <label class="form-label" for="cat_description">Descripción catalán</label>
            <textarea class="input-textarea" name="cat_description">{{ old("cat_description") }}</textarea>
            @if ($errors->has('cat_description'))
              <span class="errors">
                <strong>{{ $errors->first('cat_description') }}</strong>
              </span>
            @endif
          </div>
        </div>
        {{-- tags --}}
        <div class="cajitas-form tags-div {{ $errors->has('tags') ? ' has-error' : '' }}">
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
          @if ($errors->has('tags'))
            <span class="errors">
              <strong>{{ $errors->first('tags') }}</strong>
            </span>
          @endif
        </div>

        <div class="cajitas-form">

          <div class="input-div {{ $errors->has('primary_img') ? ' has-error' : '' }}">
            <p class="form-label">Imagen Principal</p>
            <div class="flex">
              <div style="width:200px; height:200px">
                <img class="img-portada hidden" src="#" id="placeholder" alt="imagen principal">
              </div>
              <label class="primary-img custom-upload" for="primaryImgUpload">
                <i class="fa fa-camera"></i>
              </label>
              <input class="upload-file" type="file" name="primary_img" id="primaryImgUpload" accept="image/*" value="null">
            </div>
          </div>
          {{-- pintamos errores --}}
          @if ($errors->has('primary_img'))
            <span class="errors">
              <strong>{{ $errors->first('primary_img') }}</strong>
            </span>
          @endif

        </div>

        <div class="cajitas-form">
          <p class="form-label" for="altImg[]">Otras imagenes</p>
          <section id="altImages" class="flex">
            {{-- nombre de la vista que tiene la info que cambia--}}
            @include('/projects/altimages')
          </section>
        </div>


        {{-- <div class="cajitas-form">
        <h2 class="form-label">Más imágenes</h2>
        <label class="custom-upload" for="upload">
        <i class="fa fa-camera"></i>
      </label>
      {{-- <label class="form-label" for="altImg[]">
      <i class="fa fa-camera" aria-hidden="true"></i>
    </label> --}}
    {{-- <input class="upload-file" type="file" name="altImg[]" id="upload" accept="image/*" multiple> --}}
    {{-- </div> --}}
  </div>

  <div class="input">
    <a href="/admin/proyectos" class="btn neg" type="cancel" name="button">Cancelar</a>
    <button class="btn" type="submit" name="button">Guardar</button>
  </div>

</form>
</div>
</div>
@endsection

@section('scripts')
  <script src="{{ asset('js/backAjax.js') }}"></script>
  {{-- <script src="{{ asset('js/images.js') }}"></script> --}}
@endsection
