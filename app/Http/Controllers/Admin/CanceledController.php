<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class CanceledController extends Controller
{
    public function index() {
        $projects = Project::onlyTrashed()->get();
        return view('admin.canceled_projects', compact('projects'));
    }

    public function restore($id) {
        $project = Project::withTrashed()->find($id)->restore();

        return redirect()->route('admin.projects.index');
    }

    public function defDelite($id) {
        $project = Project::withTrashed()->find($id);
        $project->forceDelete();

        return redirect()->route('admin.canceled');
        
    }

    public function defDeliteAll() {
        $projects = Project::onlyTrashed();
        $projects->forceDelete();

        return redirect()->route('admin.canceled');
    }
}


