<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    public $guarded = ['id'];

    public function category(): BelongsTo{
        return $this->belongsTo(MCategoryTask::class,'category_id','id');
    }
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
}
