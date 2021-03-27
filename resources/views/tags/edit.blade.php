@extends('layouts.backLayout')

@section('content')
  <div class="main">
    <div class="section-title">
      <span>Etiqueta - Nueva</span>
    </div>
    <div class="main-body">
      <form class="form-project" action="/admin/etiqueta_nueva" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="div-left">
          <div class="div-top">
            <div class="input-div" id="es_name">
              <label class="form-label" for="es_name">Nombre de la etiqueta</label>
              <input class="input-project" type="text" name="es_name" value="{{ $tag->es_name }}" autofocus>
            </div>
            <div class="input-div" id="en_name">
              <label class="form-label" for="en_name">Nombre de la etiqueta</label>
              <input class="input-project" type="text" name="en_name" value="{{ $tag->en_name }}" autofocus>
            </div>
            <div class="input-div" id="cat_name">
              <label class="form-label" for="cat_name">Nombre de la etiqueta</label>
              <input class="input-project" type="text" name="cat_name" value="{{ $tag->cat_name }}" autofocus>
            </div>
          </div>

          <div class="input">
            <button class="btn" type="submit" name="button">Subir</button>
            <a href="/admin/etiquetas" class="btn neg" type="cancel" name="button">Cancelar</a>
          </div>
        </form>
      </div>
  </div>
@endsection
