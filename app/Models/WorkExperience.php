<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    use HasFactory;

    protected $table = 'work_experience';
    protected $fillable = [
        'user_id','previous_employee_history', 'category_id','subcategory_id' ,'duration' , 'days_available' , 'work_location','work_area' , 'preffered_type_work' ,'health_physical_limitation',
        'languages_spoken', 'emergency_contact'
    ];

}
