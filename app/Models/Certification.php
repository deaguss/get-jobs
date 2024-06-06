<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;

    protected $keyType = 'user_id';
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $guarded = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
      'id' => 'string',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
