<?php

namespace App\Interfaces;

use App\Book;

interface BookRepositoryInterface {

    /**
     * Returns book list
     *
     * @return mixed
     */
    public function all();

    /**
     * Get the book by id
     *
     * @param int $id
     * @return mixed
     */
    public function find($id);


    /**
     * Returns lattest book list added in current week
     *
     * @param array $data
     * @return mixed
     */
    public function getLattestBooksAdded();


   /**
     * Returns book reservation status
     *
     * @param array $data
     * @return mixed
     */
    public function getReservationStatus($id);


    /**
     * Returns book reservation status
     *
     * @param array $data
     * @return mixed
     */
    public function getAvailableBooks();

    /**
     * Returns book's ISBN 
     *
     * @param int $id
     * @return mixed
     */
    public function getISBN($id);

    /**
     * Add/Create a new Book with the payload
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * Updates old book with new book information
     *
     * @param Book $book
     * @param array $data
     * @return mixed
     */
    public function update(Book $book, array $data);

    /**
     * Deletes a Book field and detaches all relations
     * @param int $id
     * @return boolean
     */
    public function delete($id);

  
}
