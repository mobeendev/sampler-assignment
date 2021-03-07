<?php

namespace App\Repositories;

use App\Book;
use App\User;
use JWTAuth;
use App\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface {

     /**
     * Returns all user(s) list
     *
     * @return mixed
     */
    public function all(){ 

          return User::with('books')->find(JWTAuth::user()->id);
    }

    /**
     * Get the user by id
     *
     * @param int $id
     * @return mixed
     */
    public function find($id){}


    /**
     * Return list of all the books borrowed/checkin by user
     *
     * @param array $data
     * @return mixed
     */
    public function getCheckedInBooks(){
          return User::with('books')->find(JWTAuth::user()->id);
    }


     /**
     * Return list of all the books returned/checkout by user
     *
     * @param array $data
     * @return mixed
     */
    public function getCheckedoutBooks(){}

}
