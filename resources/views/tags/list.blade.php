@extends('layouts.backLayout')

@section('content')
  <div class="main">
    <div id="modal">
      <div class="modalMessege">
        <p id="pregunta">¿ELIMINAR?</p>
        <p class="h5">No se puede deshacer.</p>
        <div class="confirmacion">
          <div  id="confirm" class="btn">Sí, eliminar</div>
          <div id="decline" class="btn neg">No, volver atrás</div>
        </div>
      </div>
    </div>
    <div class="section-title">
      <span>Etiquetas</span>
      <div class="controls">
        <div class="control">
          <a href="/admin/etiqueta_nueva">+</a>
        </div>
        <form class="search" action="/admin/buscarProyectos" method="get">
          <input class="search-box" type="text" name="search" value="" placeholder="buscar">
          <button class="search-button" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
        <select class="control-select" name="">
          <option value=""><a href="#">Acciones por Lote</a></option>
          <option value=""><a href="/admin/proyectos_eliminar">Eliminar</a></option>
        </select>
      </div>
    </div>
    <div class="main-body">
      <table>
        <tr>
          <th>Nombre</th>
          <th>Nombre EN</th>
          <th>Nombre CAT</th>
          <th class="project-ctrl">Editar</th>
          <th class="project-ctrl">Eliminar</th>
          <th class="actions project-ctrl"><input type="checkbox" name="selectAll" id="selectAll"></th>
        </tr>
        @foreach ($tags as $tag)
          <tr>
            <td>{{ $tag->es_name }}</td>
            <td>{{ $tag->en_name }}</td>
            <td>{{ $tag->cat_name }}</td>
            <td class="actions"><a class="edit" href="/admin/etiqueta_modificar/{{$tag->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
            <td class="actions"><a class="delete" href="/admin/etiqueta_eliminar/{{$tag->id}}"><i class="fa fa-times" aria-hidden="true"></i></a></td>
            <td class="actions"><input type="checkbox" name="selectAll" class="select"> </td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
@endsection
