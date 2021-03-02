<?php

namespace App\Repositories;

use App\Book;
use App\UserLog;
use App\Interfaces\UserLogRepositoryInterface;

class UserLogRepository implements UserLogRepositoryInterface {

    public function all() {
        return UserLog::all();
    }

    public function find($id) {
        return UserLog::find($id);
    }

    public function checkInBook(array $data) {

    }

    public function update(UserLog $product, array $data) {

    }

  
    public function delete($id) {
        
    }

}
