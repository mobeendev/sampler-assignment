<?php

namespace App\Repositories;

use App\Book;
use App\User;
use App\UserLog;
use JWTAuth;

use App\Interfaces\UserLogRepositoryInterface;

class UserLogRepository implements UserLogRepositoryInterface {

    private $user;

    public function __construct() {
        $this->user = JWTAuth::user();
    }

    /**
     * Returns logs list
     *
     * @return mixed
     */
    public function all(){
        UserLog::all();
    }

     /**
     * Get the log by id
     *
     * @param int $id
     * @return mixed
     */
    public function find($id){}

    /**
     * Create check-in record when a book is issued to the user with the payload
     *
     * @param Book $book
     * @return mixed
     */
    public function checkInBook(Book $book){

        $user = JWTAuth::user();

        $user->books()->attach($book,['action' => 3]);

        $book->status_id = 2;        

        $book->save();

        return $book;

    }


    /**
     * Delete/Checkout book and user record when a user returns the book(s)
     *
     * @param Book $book
     * @return mixed
     */
    public function checkOutBook(Book $book){

        $user = JWTAuth::user();

        $user->books()->attach($book,['action' => 4]);

        $book->status_id = 1;        

        $book->save();

        return $book;

    }


    /**
     * Returns log info for the user
     *
     * @param int $id
     * @return mixed
     */
    public function getLogsByUser($id){}

     /**
     * Returns log info for the book 
     *
     * @param int $id
     * @return mixed
     */
    public function getLogsByBook($id){}


}
