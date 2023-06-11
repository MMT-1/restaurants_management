<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemLog extends Model
{
    use HasFactory;
    protected $table = 'system_logs';
    protected $fillable = [
        'user_id',
        'owner_id',
        'user_ip',
        'status',
    ];
}
