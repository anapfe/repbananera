@extends('layouts.backLayout')

@section('content')
  <div class="main-wrapper">
    <div class="section-title">
      <span>proyecto/nuevo</span>
    </div>
    <div class="main-body">
      <form class="form-project" action="/admin/proyecto_nuevo" method="POST" enctype="multipart/form-data">
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
              @for ($i=2005; $i <= date("Y"); $i++)
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
            <label class="form-label" for="es_description">Descripción ES</label>
            <textarea class="input-textarea" name="es_description">{{ old('es_description') }}</textarea>
            @if ($errors->has('es_description'))
              <span class="errors">
                <strong>{{ $errors->first('es_description') }}</strong>
              </span>
            @endif
          </div>
          {{-- descripción en ingles  --}}
          <div class="input-div {{ $errors->has('en_description') ? ' has-error' : '' }}" id="en_description">
            <label class="form-label" for="en_description">Descripción EN</label>
            <textarea class="input-textarea" name="en_description">{{ old('en_description') }}</textarea>
            @if ($errors->has('en_description'))
              <span class="errors">
                <strong>{{ $errors->first('en_description') }}</strong>
              </span>
            @endif
          </div>
          {{-- descripción en catalan --}}
          <div class="input-div {{ $errors->has('es_description') ? ' has-error' : '' }}" id="cat_description">
            <label class="form-label" for="cat_description">Descripción CAT</label>
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
          <div class="tags">



            @foreach ($tags as $tag)
              <div class="tag">
                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" id="{{ $tag->es_name }}"
                @if (is_array(old('tags')) && in_array($tag->id, old('tags')))
                  checked
                @endif>
                <label for="{{ $tag->es_name }}" class="tag-text">
                  {{ $tag->es_name }}
                </label>
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
            <label class="form-label" for="primary_img">Imagen home</label>
            <input class="upload-file" type="file" name="primary_img" id="primary_img"  >
            @if ($errors->has('primary_img'))
              <span class="errors">
                <strong>{{ $errors->first('primary_img') }}</strong>
              </span>
            @endif
          </div>
          <div class="input-div">
            <label class="form-label" for="altImg[]">Otras imagenes</label>
            <input class="upload-file" type="file" name="altImg[]">
          </div>
          <div class="input-div">
            <input class="upload-file" type="file" name="altImg[]">
          </div>
          <div class="input-div">
            <input class="upload-file" type="file" name="altImg[]">
          </div>
          <div class="input-div">
            <input class="upload-file" type="file" name="altImg[]">
          </div>
          <div class="input-div">
            <input class="upload-file" type="file" name="altImg[]">
          </div>
        </div>

        <div class="input">
          <button class="btn" type="submit" name="button">Subir</button>
          <a href="/admin/proyectos" class="btn neg" type="cancel" name="button">Cancelar</a>
        </div>

      </form>
    </div>
  </div>
@endsection

@section('scripts')
  {{-- <SCRIPT LANGUAGE="JavaScript">

  var time = new Date();
  var year = time.getYear();
  if (year < 1900) {
  year = year + 1900;
}
var date = year - 20; /*change the '101' to the number of years in the past you want to show */
var future = year + 10; /*change the '100' to the number of years in the future you want to show */
document.writeln ("<FORM><SELECT><OPTION value=\"\">Year");
do {
date++;
document.write ("<OPTION value=\"" +date+"\">" +date+ "");
}
while (date < future)
document.write ("</SELECT></FORM>");

</script> --}}

@endsection
