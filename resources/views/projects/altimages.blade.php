<div id="alt-imgs-box">
  {{-- trae y pinta las imagenes guardadas --}}
  @foreach ($project->images as $image)
    <div class="alt-img-box">
      <a class="delete-img" href="/admin/imagen_eliminar/{{$project->id}}/{{$image->id}}"><i class="fa fa-times" aria-hidden="true"></i></a>
      <img class="edit-img" src="{{ asset ( 'storage/' . $image->path ) }}" alt="imagen">
    </div>
  @endforeach
</div>
