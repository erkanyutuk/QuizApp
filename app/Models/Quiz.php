<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Quiz extends Model
{

    use HasFactory;
    use Sluggable;
    protected $fillable = ['title', 'description', 'finished_at'];
    protected $dates = ['finished_at'];
    protected $appends = ['details'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function getFinishedAtAttributes($date)
    {
        return $date ? Carbon::parse($date) : null;
    }
    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }
    public function my_result()
    {
        return $this->hasOne('App\Models\Results')->where('user_id', auth()->user()->id);
    }
    public function results()
    {
        return $this->hasMany('App\Models\Results');
    }
    public function getDetailsAttribute()
    {
        return $this->results()->avg('point');
    }
    public function top_ten()
    {
        return $this->results()->orderByDesc('point')->take(10);
    }
}
