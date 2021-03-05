<?php

namespace App\Repositories;

use App\Book;
use App\Interfaces\BookRepositoryInterface;

class BookRepository implements BookRepositoryInterface {

    public function all() {
        return Book::all();
    }


    public function find() {
             return Book::find($id);
    }
    
    public function findByTitle($title) {
        return Book::where('title', $title)->get();
    }

     public function findByAuthor($author) {
        return Book::with('Authors')->where('name', '=', $author)->get();
    }
      public function findByISBN($isbn) {
        return Book::where('ISBN', $isbn)->get();
    }

    public function getLattestBooksAdded($id) {
        return Book::where('status', 1)
               ->orderByDesc('published_at')
               ->take(10)
               ->get();
    }


    public function checkIsBookAvailable($id) {
        return Book::where('status', 1)->first();
    }


    public function getAvailableBooks() {
           return Book::where('status', 1)->get();
    }

    public function create(array $data) {
      return Book::create($data);
    }


public function update(Book $book, array $data) {


        $book->update($data);
        
        return $book;
    }

    public function delete($id) {
       
    }

}
