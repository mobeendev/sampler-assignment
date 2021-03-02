<?php

namespace App\Interfaces;

use App\UserLog;

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
    public function checkInBook(array $data);


    /**
     * Delete/Checkout book and user record when a user returns the book(s)
     *
     * @param array $data
     * @return mixed
     */
    public function checkOutBook(array $data);

    /**
     * Deletes a user log record 
     * @param int $id
     * @return boolean
     */
    public function deleteLog($id);

    /**
     * Returns log info with all users that are related to the given log id
     *
     * @param int $id
     * @return mixed
     */
    public function logWithUserInfo($id);
}
