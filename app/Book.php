<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Book extends Model {

    protected $fillable = ['name', 'author'];

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function delete() {
        DB::transaction(function() {
            $this->users()->detach();
            parent::delete();
        });
    }

}
