<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use App\Models\Job;


class DashboardController extends Controller
{


public function index()
{
    

    $jobsData = Job::latest()->get();
    
    $jobs=[];
      foreach($jobsData as $job){

      $jobs[]= [
        'id' => $job->id,
        'title' => $job->title,
        'company_name' => $job->company_name ?? '',
        'extra' => $job->extra_info ? explode(',', $job->extra_info) : [],
        'experience' => $job->experience,
        'salary' => $job->salary,
        'location' => $job->location,
        'description' => substr($job->description,0, 100),
        'skills' => $job->skills->pluck('name')->toArray(),
        'logo' => $job->logo ?  $job->logo : '' ,
        'postedTime' => $job->created_at? $job->created_at->diffForHumans() : '',
      ];
      }
       

    return Inertia::render('Dashboard', ['jobs' => $jobs]);
}

    
}
