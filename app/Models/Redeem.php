<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vouchers;

class Redeem extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function voucher(){
        return $this->belongsTo(Vouchers::class);
    }
}
