<?php

namespace App\Repositories;

use App\Book;
use App\Interfaces\BookRepositoryInterface;

class BookRepository implements BookRepositoryInterface {

    public function all() {
        return Category::all();
    }

    public function bookWithUsers($id) {
        return Book::with('users')->where('id', $id)->get()->first()->toArray();
    }

    public function getReservationStatus($id) {
    }


    public function getAvailableBooks() {
    }

    public function create(array $data) {
      return Book::create($data);
    }

    public function delete($id): boolean {
        
    }

    public function find($id) {
        return Book::find($id);
    }

    public function update(Category $category, array $data) {
       
    }

}
