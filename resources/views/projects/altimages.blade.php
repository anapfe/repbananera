<div id="alt-imgs-box">

  @isset($project)
    {{-- trae y pinta las imagenes guardadas --}}
    @foreach ($project->images as $image)
      <div class="alt-img-box">
        {{-- acá se lanza el javascript y se pasa el token  --}}
        <a href="javascript:ajaxDelete('{{url('admin/imagen_eliminar?project_id='. $project->id . '&image_id='. $image->id)}}','{{csrf_token()}}')"><i class="fa fa-times" aria-hidden="true"></i></a>
        <img src="{{ asset ( 'storage/' . $image->path ) }}" alt="imagen del proyecto">
      </div>
    @endforeach
  @else
    <div class="alt-img-box hidden">
      <img src="#" alt="imagen del proyecto">
    </div>
  @endisset

</div>

<div class="input-div">
  <label class="custom-upload" for="upload">
    <i class="fa fa-camera"></i>
  </label>
  <input class="upload-file" type="file" name="altImg[]" accept="image/*" id="upload" multiple>
</div>
