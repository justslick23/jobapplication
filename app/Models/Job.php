<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'job_posts'; // Ensure this matches your table name

    protected $casts = [
        'application_deadline' => 'datetime', // Cast to a Carbon date instance
        'skills' => 'array', // Cast skills to an array if stored as JSON
    ];

    protected $fillable = [
        'title',
        'description',
        'department_id',
        'location',
        'application_deadline',
        'status', // Include job status
        'user_id', // Include user_id to track who created the post
        'job_type', // Add job type
        'education', // Add education requirement
        'experience', // Add experience requirement
        'skills', // Include skills
    ];

    // Define relationships if necessary
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class); // Assuming you have a User model
    }
}
