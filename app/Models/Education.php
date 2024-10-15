<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $table = 'educations'; // Explicitly define the table name

    protected $fillable = [
        'degree',
        'institution',
        'graduation_date',
        'application_id', // Foreign key to associate with Application
    ];

    // Define the relationship with the Application model
    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
