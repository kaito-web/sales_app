<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PlanProfiles extends Model
{
    use HasFactory;

    protected $table = 'plan_profiles';

    protected $fillable = [
        'plan_name',
        'plan_description',
        'price',
    ];
    public function companies(): BelongsToMany
    {
        return $this->belongsToMany(CompanyProfile::class, 'company_plan', 'plan_id', 'company_id');
    }
    public function company_profiles()
    {
        return $this->belongsToMany(CompanyProfile::class, 'company_plan', 'plan_id', 'company_id');
    }
}
