<?php

namespace App\Http\Controllers;

use App\Category;
use App\Events\ProjectSaved;
use App\Http\Requests\SaveProjectRequest;
use App\Project;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{

    /* APLICANDO EL MIDDLEWARE EN EL CONTROLADOR */
    public function __construct(){
        /* APLICO EL MIDDLEWARE auth EN TODOS LAS RUTAS EXCEPTO EN LA RUTA index Y show */
        $this->middleware('auth')->except('index', 'show');
        /* 
            SI QUISIERA APLICARLE EL MIDDLEWARE A UNA SOLA RUTA PODRIA APLICAR EL METODO only 
                $this->middleware('auth')->only('create');
        */
    }

    public function index()
    {
        $projects = Project::with('category')->orderBy('created_at', 'DESC')->paginate();
        $newProject =  new Project;

        return view('projects.index', [
            'projects' => $projects,
            'newProject' => $newProject
        ]);
    }

    public function create()
    {
        $newProject = new Project;
        
        $this->authorize('create', $newProject);

        return view('projects.create', [
            'project' => $newProject,
            'categories' => Category::pluck('nombre', 'id')
        ]);
    }

    public function store(SaveProjectRequest $request)
    {   
        
        $project = new Project($request->validated());

        $this->authorize('create', $project);
        /* 
            OBTENGO LA IMAGEN QUE ENVIAN POR EL REQUEST
                $request->file('imagen') 
                
            CON $request->file('imagen')->store('imagenes'); OBTENGO LA DIRECCIÓN DE LA IMAGEN QUE SE ALMACENARA
            EN storage/app/public/imagenes HABIENDO CONFIGURADO PRIMERO EN EL ARCHIVO .env EL PARAMETRO

                FILESYSTEM_DRIVER=public

        */
        $project->imagen = $request->file('imagen')->store('imagenes');
        $project->crearSlug();

        $project->save();

        /* DISPARO EL EVENTO DESPUES DE QUE SE GUARDA EL PROYECTO, ESTE EVENTO PERMITIRA OPTIMIZAR LA IMAGEN 
        A TRAVEZ DEL LISTENER OptimizarImagenProject */
        ProjectSaved::dispatch($project);

        return redirect()->route('projects.index')->with('mensaje', 'El proyecto fue creado con éxito!!!');
        
    }

    public function show(Project $project)
    {
        return view('projects.show', [
            'project' => $project
        ]);
    }

    public function edit(Project $project)
    {

        $this->authorize('update', $project);

        return view('projects.edit', [
            'project' => $project,
            'categories' => Category::pluck('nombre', 'id')
        ]);
    }


    public function update(Project $project, SaveProjectRequest $request)
    {

        $this->authorize('update', $project);

        /* 
            CON EL METODO fill() RELLENO TODOS LOS CAMPOS DEL $project QUE PASAN LA VALIDACIÓN
        */
        $project->fill($request->validated());
        $project->crearSlug();

        /* PREGUNTO SI ES QUE VIENE ALGUNA IMAGEN EN EL REQUEST, PORQUE TALVEZ NO LA ACTUALIZO */
        if ($request->hasFile('imagen')) {
            /* SI VIENE UNA IMAGEN NUEVA LA ELIMINO DEL STORAGE */
            Storage::delete($project->imagen);
            /* LA ALMACENO EN EL storage Y LE ASIGNO LA  RUTA DE LA NUEVA IMAGEN AL $project */
            $project->imagen = $request->file('imagen')->store('imagenes');
        }

        /* ACTUALIZO EL PROYECTO */
        $project->update();

        /* DISPARO EL EVENTO DESPUES DE QUE SE GUARDA EL PROYECTO, ESTE EVENTO PERMITIRA OPTIMIZAR LA IMAGEN 
        A TRAVEZ DEL LISTENER OptimizarImagenProject */
        ProjectSaved::dispatch($project);

        return redirect()->route('projects.index')->with('mensaje', 'El proyecto fue actualizado con éxito!!!');
    }

    public function projectsDeleted(){
        $projectsDeleted = Project::onlyTrashed()->orderBy('deleted_at', 'DESC')->get();
        
        return view('projects.deleted', [
            'projectsDeleted' => $projectsDeleted,
        ]);
    }

    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);

        $project->delete();

        return redirect()->route('projects.index')->with('mensaje', 'El proyecto fue eliminado con éxito!!!');
    }

    public function restore($slugProject){
        $project = Project::withTrashed()->whereSlug($slugProject)->firstOrFail();

        $this->authorize('restore', $project);

        $project->restore();

        return redirect()->route('projects.index')->with('mensaje', 'El proyecto fue restaurado con éxito!!!');
    }

    public function forceDelete($slugProject)
    {
        $project = Project::withTrashed()->whereSlug($slugProject)->firstOrFail();

        $this->authorize('forceDelete', $project);

        Storage::delete($project->imagen);

        $project->forceDelete();

        return redirect()->route('deleted')->with('mensaje', 'El proyecto fue eliminado permanentemente con éxito!!!');
    }

}
