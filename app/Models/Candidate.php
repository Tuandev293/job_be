<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'password',
        'full_name',
        'phone',
        'is_verified',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class, 'candidate_id', 'candidate_id');
    }

    public function uploadedCvs()
    {
        return $this->hasMany(UploadedCv::class, 'candidate_id', 'candidate_id');
    }

    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class, 'candidate_id', 'candidate_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'candidate_id', 'candidate_id');
    }
}