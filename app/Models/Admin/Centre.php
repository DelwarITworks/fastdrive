<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\Practical;
use App\Models\Admin\Schedule;

class Centre extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Practical()
    {
        return $this->hasMany(Practical::class);
    }
    public function Schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
