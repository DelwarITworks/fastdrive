<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\Payment;
use App\Models\Admin\Centre;

class Practical extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function Payment()
    {
        return $this->hasOne(Payment::class);
    }
    public function Centre()
    {
        return $this->belongsTo(Centre::class);
    }

}
