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
  @endisset

  <div class="input-div" id='altImgUploadBox'>
    <label class="custom-upload" for="altImgsUpload">
      <i class="fa fa-camera"></i>
    </label>
    <input class="upload-file" type="file" name="altImg[]" accept="image/*" id="altImgsUpload" value="null" multiple>
  </div>

</div>
