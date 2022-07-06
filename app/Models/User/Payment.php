<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\Practical;
use App\Models\User\Theory;
use App\Models\Admin\Partialpayment;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function Practical()
    {
        return $this->belongsTo(Practical::class);
    } 
    public function Theory()
    {
        return $this->belongsTo(Theory::class);
    }
    public function Partialpayment()
    {
        return $this->hasMany(Partialpayment::class);
    }
}
