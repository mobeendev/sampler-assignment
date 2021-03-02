<?php

namespace App\Interfaces;

use App\User;

interface UserRepositoryInterface {

    /**
     * Returns all user(s) list
     *
     * @return mixed
     */
    public function all();

    /**
     * Get the user by id
     *
     * @param int $id
     * @return mixed
     */
    public function find($id);


    /**
     * Return list of all the books borrowed/checkin by user
     *
     * @param array $data
     * @return mixed
     */
    public function getCheckedInBooks($id);


   /**
     * Return list of all the books returned/checkout by user
     *
     * @param array $data
     * @return mixed
     */
    public function getCheckedoutBooks($id);


    /**
     * Create new user
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data);


  
    /**
     * Delete user ifo
     *
     * @param array $data
     * @return mixed
     */
    public function delete($id);




}
