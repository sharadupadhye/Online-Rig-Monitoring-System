<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Employee extends Model
{
  protected $table = 'employees';
  protected $primaryKey = 'id';
   protected $fillable = [
        
        'options2',
        'STATUS1',
        'MODE1',
        'SAMPLE1',
        'CYCLES1',
        'RPM1',
        'GBTEMP1',
        'MBTEMP1',
        'OBTEMP1',
        'PRESSURE1',
        'REMARK1',
        'PERSON1',
        'STATUS2',
        'MODE2',
        'SAMPLE2',
        'CYCLES2',
        'RPM2',
        'GBTEMP2',
        'MBTEMP2',
        'OBTEMP2',
        'PRESSURE2',
        'REMARK2',
        'PERSON2',
        'STATUS3',
        'MODE3',
        'GEAR3',
        'SAMPLE3',
        'HRS3',
        'CYCLES3',
        'RPM3',
        'MMTORQ3',
        'G1RPM3',
        'G1TORQ3',
        'G2RPM3',
        'G2TORQ3',
        'MMTEMP3',
        'G1TEMP3',
        'G2TEMP3',
        'OILTEMP3',
        'PRESSURE3',
        'REMARK3',
        'PERSON3',

    ];

    use HasFactory;

}
