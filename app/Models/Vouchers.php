<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Redeem;

class Vouchers extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function redeem(){
        return $this->hasOne(Redeem::class);
    }
}
