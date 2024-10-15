<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $table = 'experiences'; // Explicitly define the table name

    protected $fillable = [
        'job_title',
        'company_name',
        'description',
        'start_date',
        'end_date',
        'application_id', // Foreign key to associate with Application
    ];

    // Define the relationship with the Application model
    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
