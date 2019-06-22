<?php

namespace App\Http\Controllers;
use App\Project;
use App\User;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin');
        
        $this->users = User::all();
    }

    public function index()
    {
        $projects = Project::paginate(10);
        return view('project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = $this->users;
        return view('project.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'assign_to' => 'required|string',
        ]);

        $project = new Project();
        $project->name = $request->name;
        $project->assign_to = $request->assign_to;
        $project->save();
        
        return redirect()->route('get-projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = $this->users;
        $project = Project::findOrFail($id);
        return view('project.edit', compact('project', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'assign_to' => 'required|string',
        ]);

        $project = Project::findOrFail($id);
        $project->name = $request->name;
        $project->assign_to = $request->assign_to;
        $project->save();

        return redirect()->route('get-projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::findOrFail($id)->delete();

        return redirect()->route('get-projects');
    }
}
