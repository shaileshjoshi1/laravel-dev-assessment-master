<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;


class Job extends Model
{
    //

    protected $table = 'jobs_tbl';

   
    protected $fillable = [
        'title', 
        'description', 
        'experience',
        'location', 
        'salary', 
        'extra_info',
        'company_name',
        'logo',

    ];

    public $timestamps = true;

    public function skills() {
        return $this->belongsToMany(Skills::class, 'job_skills');
    }
    

}
