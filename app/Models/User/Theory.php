<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\Payment;

class Theory extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function Payment()
    {
        return $this->hasOne(Payment::class);
    }
}
