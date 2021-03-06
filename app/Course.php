<?php

namespace App;

use App\Goal;
use App\Review;
use App\Student;
use App\Teacher;
use App\Category;
use App\Requirement;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    const PUBLISHED = 1;
    const PENDING = 2;
    const REJECTED = 3;
    
    //withcount
    protected $withCount = ['reviews','students'];

    // belongs to indica que la forign key esta aqui

    // path by pictore
    public function pathAttachment()
    {
        return "/storage/courses/". $this->picture;
    }

    //key by password
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // 1 -> 1
    public function category (){
        return $this->belongsTo(Category::class)->select('id','name');
    }
    
    // 1 -> N
    public function goals()
    {
        return $this->hasMany(Goal::class)->select('id','course_id','goal');
    }

    // 1 -> 1
    public function level()
    {
        return $this->belongsTo(Level::class)->select('id','name');
    }

    // 1 -> N 
    public function reviews ()
    {
        return $this->hasMany(Review::class)->select('id','course_id','user_id','rating','comment','created_at');
    }
    
    // 1 -> N
    public function requirements()
    {
        return $this->hasMany(Requirement::class)->select('id','course_id','requirement');
    }

    // N -> N
    public function students()
    {
    return $this->belongsToMany(Student::class);
    }

    //1 -> 1 
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    // attribute personalizados
    public function getRatingAttribute()
    {
        return $this->reviews->avg('rating');
    }

    //courses related
    public function relatedCourses()
    {
        return Course::with('reviews')->whereCategoryId($this->category->id)
                        ->where('id','!=',$this->id)
                        ->latest()
                        ->limit(6)
                        ->get();
    }
}
