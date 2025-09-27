<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        //dd($types);
        $technologies = Technology::all();
        return view('projects.create', compact('types', 'technologies'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);

        $data = $request->all(); //prendo tutti i dati che mi arrivano dalla request

        //dd($data);

        $newProject = new Project(); //creo un nuovo oggetto istanza del model Project

        $newProject->title = $data['title'];
        $newProject->client = $data['client'];
        $newProject->start_date = $data['start_date'];
        $newProject->end_date = $data['end_date'];
        //$newProject->technologies_used = $data['technologies_used'];
        $newProject->type_id = $data['type_id'];
        $newProject->description = $data['description'];

        //controllo se ho ricevuto un'immagine
        if(array_key_exists('image',$data)){
            //dd($data['image']);
            $img_path = Storage::putFile('projectsImg', $data['image']);
            //dd($img_path);

            $newProject->image = $img_path;
        }


        //dd($data);

        $newProject->save();

        //dopo aver salvato il progetto, posso collegargli le tecnologie se ci sono
        if($request->has('technologies')){
            $newProject->technologies()->attach($data['technologies']);
        }

        return redirect()->route('projects.show', $newProject);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {

        //dd($project->technologies); //per vedere il tipo associato al progetto

        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all(); //prendo tutti i dati che mi arrivano dalla request

        //dd($data);

        $project->title = $data['title'];
        $project->client = $data['client'];
        $project->start_date = $data['start_date'];
        $project->end_date = $data['end_date'];
        //$project->technologies_used = $data['technologies_used'];
        $project->type_id = $data['type_id'];
        $project->description = $data['description'];


        //controllo se ho ricevuto un'immagine
        if (array_key_exists('image', $data)) {
            //eliminare l'immagine precedente se esiste
            Storage::delete($project->image);

            //caricare la nuova immagine
            $img_path = Storage::putFile('projectsImg', $data['image']);

            //aggiornare il percorso dell'immagine nel progetto
            $project->image = $img_path;
        }

        //dd($data);

        $project->update();

        //verifichiamo se stiamo ricevendo le tecnologie
        if ($request->has('technologies')) {
            //dopo aver salvato il progetto e dopo aver controllato che l'array esista, posso sincronizzare le tecnologie
            $project->technologies()->sync($data['technologies']);
        }else{
            //se non ricevo nessuna tecnologia, dobbiamo eliminare tutte le relazioni esistenti
            $project->technologies()->detach();
        }


        return redirect()->route('projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // Elimina le relazioni con le tecnologie
        $project->technologies()->detach();
        
        //prima di eliminare il progetto, elimino l'immagine associata se esiste
        if($project->image){
            Storage::delete($project->image);
        }
        //dd($project);
        $project->delete();

        return redirect()->route('projects.index');
    }
}
