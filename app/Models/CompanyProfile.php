<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    use HasFactory;

    public function plans()
    {
        return $this->belongsToMany(PlanProfiles::class, 'company_plan_profile', 'company_id', 'plan_profile_id');
    }
}
