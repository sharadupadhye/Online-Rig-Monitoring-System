<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestPlanRow extends Model
{
    use HasFactory;

    protected $fillable = [
        'test_plan_id', 'shift_mode', 'rpm', 'target', 
        'block_target', 'block_1', 'block_2', 'block_3', 'block_4'
    ];

    public function testPlan()
    {
        return $this->belongsTo(TestPlan::class);
    }
}

