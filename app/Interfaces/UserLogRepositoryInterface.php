<?php

namespace App\Interfaces;

use App\UserLog;
use App\Book;

interface UserLogRepositoryInterface {

    /**
     * Returns logs list
     *
     * @return mixed
     */
    public function all();

    /**
     * Get the log by id
     *
     * @param int $id
     * @return mixed
     */
    public function find($id);

    /**
     * Create check-in record when a book is issued to the user with the payload
     *
     * @param array $data
     * @return mixed
     */
    public function checkInBook(Book $book);


    /**
     * Delete/Checkout book and user record when a user returns the book(s)
     *
     * @param array $data
     * @return mixed
     */
    public function checkOutBook(Book $book);

    /**
     * Returns log info for the user
     *
     * @param int $id
     * @return mixed
     */
    public function getLogsByUser($id);

     /**
     * Returns log info for the book 
     *
     * @param int $id
     * @return mixed
     */
    public function getLogsByBook($id);


}
