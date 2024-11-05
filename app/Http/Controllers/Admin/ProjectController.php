<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view("admin.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validaçao dos dados fornecidos pelo utente
        $movieData = $request->validate([
            "title" => "required|string|min:2|max:255", //uma stringa con min 4 caracter max 255, pois no db è un VARCHAR(255)
            "description" => "required|string|min:6|max:255",
            "category" => "required|string|min:2|max:255",
            "tech_stack" => "required|string|min:2|max:255",
            "github_link" => "required|url",
            "creation_date" => "required|date",
        ]);

        $formData = $request -> all();
        $newProject = Project::create($formData);
        return redirect()->route("admin.show", ["id"=>$newProject->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::findOrFail($id);
        return view("admin.show", compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::findOrFail($id);
         return view("admin.edit", compact("project"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $formData = $request->all();
        $project = Project::findOrFail($id);

        $project->title = $formData["title"];
        $project->description = $formData["description"];
        $project->category = $formData["category"];
        $project->tech_stack = $formData["tech_stack"];
        $project->github_link = $formData["github_link"];
        $project->creation_date = $formData["creation_date"];
        $project->update();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->route("admin.index");
    }
}