<div id="alt-imgs-box">
  {{-- trae y pinta las imagenes guardadas --}}
  @foreach ($project->images as $image)
    <div class="alt-img-box">
      {{-- acá se lanza el javascript y se pasa el token  --}}
      <a href="javascript:ajaxDelete('{{url('admin/imagen_eliminar?project_id='. $project->id . '&image_id='. $image->id)}}','{{csrf_token()}}')">
        <i class="fa fa-times" aria-hidden="true"></i>
        <img src="{{ asset ( 'storage/' . $image->path ) }}" alt="imagen del proyecto">
      </a>
    </div>
  @endforeach
</div>
