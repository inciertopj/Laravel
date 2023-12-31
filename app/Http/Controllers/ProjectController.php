<?php
namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use PDF;

class ProjectController extends Controller
{
    public function PDF(){
        $projects = Project::paginate();
        $pdf = PDF::loadView('projects.PDF', compact('projects'));
        return $pdf->stream('projects.pdf');
    }


    public function index(): Renderable
    {
        $projects = Project::paginate(10);
        return view('projects.index', compact('projects'));
    }
   
   public function create(): Renderable
   {
       $project = new Project;
       $title = __('Crear proyecto');
       $action = route('projects.store');
       $buttonText = __('Crear proyecto');
       return view('projects.form', compact('project', 'title', 'action', 'buttonText'));
   }

   public function store(Request $request): RedirectResponse
   {
       $request->validate([
           'NombreProyecto' => 'required|unique:projects,NombreProyecto|string|max:100',
           'fuenteFondos' => 'required|string|max:300',
           'MontoPlanificado' => 'required|integer',
           'MontoPatrocinado' => 'required|integer',
           'MontoFondosPropios' => 'required|integer',
       ]);
       Project::create([
           'NombreProyecto' => $request->string('NombreProyecto'),
           'fuenteFondos' => $request->string('fuenteFondos'),
           'MontoPlanificado' => $request->integer('MontoPlanificado'),
           'MontoPatrocinado' => $request->integer('MontoPatrocinado'),
           'MontoFondosPropios' => $request->integer('MontoFondosPropios'),
       ]);
       return redirect()->route('projects.index');
   }

   public function show(Project $project): Renderable
   {
       $project->load('users:id,name');
       return view('projects.show', compact('project'));
   }

   public function edit(Project $project): Renderable
   {
       $title = __('Editar proyecto');
       $action = route('projects.update', $project);
       $buttonText = __('Actualizar proyecto');
       $method = 'PUT';
       return view('projects.form', compact('project', 'title', 'action', 'buttonText', 'method'));
   }

   public function update(Request $request, Project $project): RedirectResponse
   {
       $request->validate([
           'NombreProyecto' => 'required|unique:projects,NombreProyecto,' . $project->id . '|string|max:100',
           'fuenteFondos' => 'required|string|max:300',
           'MontoPlanificado' => 'required|integer',
           'MontoPatrocinado' => 'required|integer',
           'MontoFondosPropios' => 'required|integer',
       ]);
       $project->update([
        'NombreProyecto' => $request->string('NombreProyecto'),
        'fuenteFondos' => $request->string('fuenteFondos'),
        'MontoPlanificado' => $request->integer('MontoPlanificado'),
           'MontoPatrocinado' => $request->integer('MontoPatrocinado'),
           'MontoFondosPropios' => $request->integer('MontoFondosPropios'),
       ]);
       return redirect()->route('projects.index');
   }

   public function destroy(Project $project): RedirectResponse
   {
       $project->delete();
       return redirect()->route('projects.index');
   }
}
