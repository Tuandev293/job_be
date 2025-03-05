<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadedCv extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_id',
        'file_url',
        'file_name',
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'candidate_id', 'candidate_id');
    }

    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class, 'cv_id', 'cv_id');
    }
}