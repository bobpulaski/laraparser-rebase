<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'title',
    ];


    use HasFactory;

    public function chapters()
    {
        return $this->hasMany(Chapter::class, 'project_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
