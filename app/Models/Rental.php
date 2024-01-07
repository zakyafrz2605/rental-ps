<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rental extends Model
{
    protected $table = 'rentals';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'id_customer',
        'id_konsol',
        'id_pembayaran',
        'mulai',
        'selesai',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_customer', 'id');
    }

    public function console(): BelongsTo
    {
        return $this->belongsTo(Konsol::class, 'id_konsol', 'id');
    }

    public function pembayaran(): BelongsTo
    {
        return $this->belongsTo(Pembayaran::class, 'id_pembayaran', 'id');
    }


}
