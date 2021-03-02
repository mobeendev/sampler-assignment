<?php

namespace App\Repositories;

use App\Book;
use App\User;
use App\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface {

    public function all() {
        return Product::all();
    }

    public function find($id) {
        return User::find($id);
    }

    
    public function create(array $data) {
        
        return User::create($data);
    }


    public function checkInBook(User $user, array $data) {

        $user->books()->detach();

        $user->update($data);


        if (isset($data['books']) && !empty($data['books'])) {
            $user->books()->attach($data['books']);
        }
        return $user;
    }

    public function update(User $user, array $data) {
 
        return $user;
    }


    public function getSingleBook($id) {
        return User::with('books')->where('id', $id)->get()->first()->toArray();
    }


    public function getUserBooksList($id) {
        return User::with('books')->where('id', $id)->get()->toArray();
    }

    public function delete($id) {
        
    }

}
