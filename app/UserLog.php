<?php
namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class UserLog extends Model {

    protected $fillable = ['title', 'description', 'price', 'availability'];

    public function users() {
        return $this->belongsToMany(Category::class);
    }

    public function delete() {
        DB::transaction(function() {
            $this->users()->detach();
            parent::delete();
        });
    }

}
