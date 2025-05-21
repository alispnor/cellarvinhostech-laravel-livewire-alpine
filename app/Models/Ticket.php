<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Ticket extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $fillable = ['title', 'description', 'status', 'category_id', 'created_by'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
