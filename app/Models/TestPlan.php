<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestPlan extends Model
{
    use HasFactory;

    protected $fillable = ['details', 'oil','remark'];

    public function rows()
    {
        return $this->hasMany(TestPlanRow::class);
    }
}

