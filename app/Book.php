<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Book extends Model {

    protected $fillable = ['title', 'ISBN','publisher','published_at','price'];

    public function users() {
        return $this->belongsToMany(User::class,'user_acation_logs')->withPivot('action')->withTimestamps();

    }

    public function delete() {
        DB::transaction(function() {
            $this->users()->detach();
            parent::delete();
        });
    }

}
