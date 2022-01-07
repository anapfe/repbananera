<div id="alt-imgs-box">
  {{-- trae y pinta las imagenes guardadas --}}
  @foreach ($project->images as $image)
    <div class="alt-img-box">
      <a href="javascript:ajaxLoad('{{url('admin/imagen_eliminar?project_id='. $project->id . '&image_id='. $image->id)}}')">
        <i class="fa fa-times" aria-hidden="true"></i>
        <img src="{{ asset ( 'storage/' . $image->path ) }}" alt="imagen del proyecto">
      </a>
    </div>
  @endforeach
</div>
