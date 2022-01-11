@extends('layouts.backLayout')

@section('content')

  <div class="main">
  @include('modal')
    <div class="section-title">
      <span>Proyectos</span>
      <div class="controls">
        <div class="control">
          <a href="/admin/proyectos/nuevo">+</a>
        </div>
        <form class="search" action="/admin/proyectos/buscar" method="get">
          <input class="search-box" type="text" name="search" value="" placeholder="buscar">
          <button class="search-button" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
        <select name="">
          <option value=""><a href="#">Ordenar</a></option>
          {{-- <option value="[]"><a href="/admin/proyectos_eliminar">Eliminar</a></option> --}}
          <option value=""><a href="$">Ordenar por Fecha</a></option>
          <option value=""><a href="$">Ordenar por Nombre</a></option>
        </select>
        {{-- <div class=""><input type="checkbox" name="selectAll" id="selectAll"></div> --}}
      </div>
    </div>
    <div class="main-body">
      @if (count($projects) <= 0)
        <div class="results">
          No se encontraron resultados
        </div>
      @else
        @foreach ($projects as $project)
          <div class="projectBlock">
            <div class="one">
              <img src="{{ asset ( 'storage/' . $project->primary_img ) }}" alt="">
            </div>
            <div class="two">
              <span class="title">{{ $project->title }}</span>
              <span class="tags">
                @foreach ($project->tags as $tag)
                  @if ( $loop->first && $loop->last || $loop->last)
                    {{ $tag->es_name }}
                  @else
                    {{ $tag->es_name }},
                  @endif
                @endforeach
              </span>
              <span class="description">
                {{\Illuminate\Support\Str::limit($project->es_description, 120, '...')}}
              </span>
            </div>
            <div class="three">
              <span class="client">{{ $project->client }}</span>
              <span class="year">{{ $project->year }}</span>
            </div>
            <div class="four">
              <a class="actions show" target="_blank" href="/proyectos/{{$project->slug}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
              <a class="actions edit" href="/admin/proyectos/editar/{{$project->id}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
              <a class="actions delete" href="/admin/proyectos/eliminar/{{$project->id}}"><i class="fa fa-times" aria-hidden="true"></i></a>
              {{-- <div class="actions"><input type="checkbox" name="selectAll" class="select"></div> --}}
            </div>
          </div>
        @endforeach
      @endif
    </div>
  </div>
@endsection
