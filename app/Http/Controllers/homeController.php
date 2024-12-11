<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Certificate;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Contact;


class HomeController extends Controller
{
    public function index()
    {
        $about = About::all();
        $certificate = Certificate::all();
        $project = Project::all();
        $skill = Skill::all();
        $contact = Contact::all();

        return view('home', compact('about', 'certificate', 'project', 'skill','contact'));
    }
}
