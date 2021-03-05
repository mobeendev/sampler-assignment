<?php
namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class UserLog extends Model {

    protected $fillable = ['title', 'description', 'price', 'availability'];

}
