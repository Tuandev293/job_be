<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_id',
        'title',
        'description',
        'location',
        'salary',
        'job_type',
        'experience_required',
        'status',
        'views',
    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class, 'employer_id', 'employer_id');
    }

    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class, 'job_id', 'job_id');
    }
}