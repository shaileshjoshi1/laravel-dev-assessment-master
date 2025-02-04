<?php

namespace App\Livewire\Pages\Jobs;

use Livewire\Component;

use App\Models\Job; 
use App\Models\Skills;
use App\Models\JobSkills;
class Index extends Component
{
    public $jobs;


    public function mount()
    { 
        $this->loadJobs(); 
       
       
    
        // $this->jobs = [
        //     [
        //         "id" => 1,
        //         "title" => "Sr. Full Stack Developer",
        //         "description" => "You will be responsible for designing, developing, and maintaining robust and scalable web applications from end to end. You must have a deep understanding of both frontend and backend development, thrives in a collaborative environment, and is passionate about delivering high-quality software solutions",
        //         "company_name" => "DWebPixel",
        //         "company_logo" => asset('logo-3.svg'),
        //         "experience" => "4-5 Yrs",
        //         "salary" => "$ 4.5-8 Lacs PA",
        //         "location" => "Remote",
        //         "skills" => [
        //             "Laravel",
        //             "React",
        //             "Vue",
        //             "MySQL",
        //         ],
        //         "extra" => [
        //             "Remote",
        //             "Full-Time",
        //         ]
        //     ],
        //     [
        //         "id" => 2,
        //         "title" => "Sr. Frontend Developer",
        //         "description" => "You will leverage your expertise in modern frontend technologies and best practices to create exceptional user experiences.",
        //         "company_name" => "DWebPixel",
        //         "company_logo" => asset('logo-2.svg'),
        //         "experience" => "3-4 Yrs",
        //         "salary" => "$ 2.5-4 Lacs PA",
        //         "location" => "Remote",
        //         "skills" => [
        //             "React",
        //             "Vue",
        //         ],
        //         "extra" => [
        //             "Remote",
        //             "Full-Time",
        //         ]
        //     ]
        // ];
    }

    public function loadJobs()
    {
        $this->jobs = Job::with('skills')->latest()->get(); 
       
        foreach ($this->jobs as $job) {
            $job->extra = $job->extra_info ? explode(',', $job->extra_info) : [];
        }
    }

    public function deleteJob($id)
    {
        $job = Job::find($id);

        
        if ($job) {

            if ($job->logo && \Storage::disk('public')->exists($job->logo)) {
                \Storage::disk('public')->delete($job->logo);
            }
            
            JobSkills::where('job_id', $id)->delete();

            
            Job::destroy($id);
            $this->loadJobs();
            $this->dispatch('jobDeleted', 'Job deleted successfully!');
        }
    }


    public function render()
    {
        return view('livewire.pages.jobs.index');
    }
}
