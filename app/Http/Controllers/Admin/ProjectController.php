<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use App\Models\Type;
use App\Models\Language;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     
     */
    public function index()
    {
        if(Auth::user()->isAdmin()){
            $projects = Project::paginate(5);
        } else {
            $userId = Auth::id();
            $projects = Project::where('id', $userId)->paginate(5);
        }
        $types = Type::all();
        return view('admin.projects.index',compact('projects','types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     
     */
    public function create()
    {
        $types = Type::all();
        $languages = Language::all();
        return view('admin.projects.create',compact('types','languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
    
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();
        $slug = Project::generateSlug($request->name_project);
        $data['slug'] = $slug;
        if($request->hasFile('cover_image')){
            $path = Storage::disk('public')->put('project_images', $request->cover_image);
            $data['cover_image'] = $path;
        }

        $new_project = Project::create($data);
        if($request->has('languages')){
            $new_project->languages()->attach($request->languages);
        }
        
        return redirect()->route('admin.projects.index', $new_project->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
   
     */
    public function show(Project $project)
    {
        $types = Type::all();
        return view('admin.projects.show', compact('project','types'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $languages = Language::all();
        return view('admin.projects.edit', compact('project','types','languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        $slug = Project::generateSlug($request->name_project);
        $data['slug'] = $slug;
        if($request->hasFile('cover_image')){
            if ($project->cover_image) {
                Storage::delete($project->cover_image);
            }

            $path = Storage::disk('public')->put('project_images', $request->cover_image);
            $data['cover_image'] = $path;
        }
        $project->update($data);
        if($request->has('languages')){
            $project->languages()->sync($request->languages);
        } else {
            $project->languages()->sync([]);
        }
        return redirect()->route('admin.projects.index')->with('message', "$project->name_project updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', "$project->name_project deleted successfully");
    }
}
