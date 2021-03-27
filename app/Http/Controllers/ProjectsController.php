<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Project;
use \App\Tag;
use \App\Image;
use Illuminate\Support\Str;

class ProjectsController extends Controller
{

  // buscar proyectos
  public function searchProjects(Request $request) {
    $projects = Project::where('title', 'like', '%' . $request->input('search') . '%')->get();
    $param = [
      'projects' => $projects,
    ];
    return view('projects.list', $param);
  }

  // lista proyectos
  public function listProjects() {
    return view('projects.list', ['projects' => Project::orderBy('created_at', 'desc')->paginate(30)]);
  }

  // proyectos por año
  public function listProjectsByYear()
  {
    $projects = Project::orderBy('year', 'desc')->get();
    $param = [
      "projects" => $projects
    ];
    return view('projects.list', $param);
  }

  // proyectos por cliente
  public function listProjectsByClient()
  {
    $projects = Project::orderBy('client', 'asc')->get();
    $param = [
      "projects" => $projects
    ];
    return view('projects.list', $param);
  }

  // proyectos por titulo
  public function listProjectsByTitle()
  {
    $projects = Project::orderBy('title', 'asc')->get();
    $param = [
      "projects" => $projects
    ];
    return view('projects.list', $param);
  }

  // proyectos por tag
  public function listProjectsByTag($tag_name)
  {
  //   $tag = Tag::where("es_name", "=", $tag_name)->first();
  //   $tags = Tag::orderBy('es_name', 'asc')->get();
  //   $projects = $tag->projects;
  //
  //   // $param = [
  //   //   'tags' => $tags,
  //   //   'projects' => $projects,
  //   // ];
  //
  // //este bloque está para que si hay una petición ajax solamente vaya a los datos sin toda la info HTML que no es parseable o no es JSONEABLE
  //   if ($request->ajax()) {
  //     //va a los datos
  //     return view('index', compact('posts'));
  //   } else {
  //     // va a la página normal
  //     return view('ajax', compact('tag', 'tags', 'projects'));
  //   }

  }

  // descripcion de proyecto para index
  public function showProject(Request $request, $slug) {
      $project = Project::where("slug", "=", $slug)->first();
      if ($project == null) {
        return redirect('/error');
      }
      $project->etiquetas = "";
      foreach ($project->tags as $key => $tag) {
        if ( $key === 0 ) {
          $project->etiquetas .= $tag->es_name;
        } else {
          $project->etiquetas .= ", " . $tag->es_name;
        }
      }

      $param = [
        'project' => $project
      ];
      return view('projects.show', $param);
  }

  // ir a la pag para crear proyecto
  public function createProject() {
    $tags = Tag::orderBy('es_name', 'asc')->get();
    $param = [
      'tags' => $tags
    ];
    return view('projects.create', $param);
  }

  // funcion auxiliar para subida de multiphoto
  public function multiPhoto(Request $request, $project) {
    $images = $request->file('altImg');
    foreach($images as $key => $value) {
      $image = $this->uploadPhoto($value, $project);
    }
  }
  public function uploadPhoto($image, $project) {
    $extension = $image->getClientOriginalExtension();
    $path = $image->storeAs("/project_img", uniqid() . "." . $extension, 'public');
    $image = Image::create([
      'path' => $path
    ]);

    $image->project()->associate($project);
    $image->save();

    return $image;
  }

  // guardar proyecto
  public function storeProject(Request $request) {
    $rules = [
      "title" => "required",
      "year" => "required|numeric",
      "client" => "required",
      "tags" => 'required',
      "es_description" => 'required',
      "en_description" => 'required',
      "cat_description" => 'required',
      "primary_img" => 'required'
    ];
    $messages = [
      "required" => "El campo es requerido",
      "numeric" => "El campo debe ser un número"
    ];

    $request->validate($rules, $messages);

    if ($request->has('primary_img')) {
      $extension = $request->file('primary_img')->getClientOriginalExtension();
      $path = $request->file('primary_img')->storeAs("/project_img", uniqid() . "."  . $extension, 'public');
    } else {
      $path = "";
    }

    $project = Project::create([
      "title" => $request->input('title'),
      "es_description" => $request->input('es_description'),
      "en_description" => $request->input('en_description'),
      "cat_description" => $request->input('cat_description'),
      "year" => $request->input("year"),
      "client" => $request->input("client"),
      'slug' => Str::kebab($request->input('title') . $request->input('client') . "-" . $request->input('year')),
      "primary_img" => $path
    ]);

    if ($request->file('altImg') == !null) {
      $this->multiPhoto($request, $project);
    }

    $project->tags()->sync($request->input('tags'));
    $project->save();
    return redirect('/admin/proyectos');
  }

  // editar proyect
  public function editProject($id)
  {
    $project = Project::find($id);
    $tags = Tag::all();
    $etiquetas = $project->tags;
    $param = [
      'project' => $project,
      'tags' => $tags,
      'etiquetas' => $etiquetas
    ];
    return view('projects.edit', $param);
  }

  public function updateProject(Request $request, $id)
  {
    $project = Project::find($id);

    $project->title = $request->input('title');
    $project->es_description = $request->input('es_description');
    $project->en_description = $request->input('en_description');
    $project->cat_description = $request->input('cat_description');
    $project->year = $request->input('year');
    $project->client = $request->input('client');
    $project->slug = Str::kebab($request->input('title') . "-" . $request->input('client') . "-" . $request->input('year'));

    if ($request->has('primary_img')) {
      $extension = $request->file('primary_img')->getClientOriginalExtension();
      $path = $request->file('primary_img')->storeAs('/project_img', uniqid() . "."  . $extension, 'public');
      $project->primary_img = $path;
    } else {
      $project->primary_img = $project->primary_img;
    }


    if ($request->file('altImg') == !null) {
      $this->multiPhoto($request, $project);
    }

    $project->tags()->sync($request->input('tags'));
    $project->save();

    return redirect('/admin/proyectos');
  }

  public function destroyProject($id)
  {
    $project = Project::find($id);
    $project->tags()->sync([]);
    foreach($project->images as $image) {
      // $image->project()->dissociate();
      $image->project_id = null;
      $image->save();
    }
    $project->delete();
    return redirect('/admin/proyectos');
  }

  public function error404() {
    return view('error404');
  }
}
