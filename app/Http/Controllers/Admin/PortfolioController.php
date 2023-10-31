<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;


class PortfolioController extends Controller
{
    //

    public function addProjects()
    {
        return view('admin.projects.add_projects');
    }

    public function saveProjects(Request $request)
    {
        //from validation
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image',
            'link' => 'required',
        ], [
            'title.required' => 'Projects title is required.',
            'description.required' => 'Projects description is required.',
        ]);

        //image upload
        if ($request->image) {
            $image = $request->image;
            $imageName = rand() . '.' . $image->getClientOriginalName();
            $image->move('upload/projects_images/', $imageName);
            $imageUrl = 'upload/projects_images/' . $imageName;
        }
        $project = new Project();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->image =  $imageUrl;
        $project->link = $request->link;
        $project->save();
        return redirect()->back()->with('message', 'Project created successfully');
    }


    public function manageProjects()
    {
        $Projects = Project::orderBy('id', 'desc')->get();
        return view('admin.projects.manage_projects', compact('Projects'));
    }

    public function editProjects($id)
    {
        $Projects = Project::find($id);
        return view('admin.Projects.edit_projects', compact('Projects'));
    }

    public function updateProjects(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'link' => 'required',
        ], [
            'title.required' => 'Projects title is required.',
            'description.required' => 'Projects description is required.',
            'link.required' => 'Projects Link is required.',
        ]);

        $project = Project::find($request->id);

        //image upload
        if ($request->image) {
            if (File::exists($project->image)) {
                unlink($project->image);
            }
            $image = $request->image;
            $imageName = rand() . '.' . $image->getClientOriginalName();
            $image->move('upload/projects_images/', $imageName);
            $imageUrl = 'upload/projects_images/' . $imageName;
            $project->image =  $imageUrl;
        }
        $project->title = $request->title;
        $project->description = $request->description;
        $project->link = $request->link;
        $project->save();
        return redirect()->route('admin.manage.projects')->with('message', 'Projects Updated successfully');
    }


    public function deleteProjects($id)
    {
        $project = Project::find($id);
        if (File::exists($project->image)) {
            unlink($project->image);
        }

        $project->delete();
        return redirect()->back()->with('message', 'Project Deleted successfully');
    }
}
