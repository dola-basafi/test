<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MCategoryTask extends Model
{
    use HasFactory;
    protected $table = 'm_category_tasks';
    public $guarded = ['id'];

    public function task(): HasMany{
        return $this->hasMany(Task::class,'category_id');
    }
}