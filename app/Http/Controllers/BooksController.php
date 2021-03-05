<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\BookRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class BooksController extends BaseController {

    private $bookRepo;

    public function __construct(BookRepositoryInterface $bookRepository) {
        $this->bookRepo = $bookRepository;
    }

    public function index() {

        $books = $this->bookRepo->all();

        return $this->sendResponse('Books list retrieved successfully.', $books->toArray());
    }

    public function show($id) {

        $book = $this->bookRepo->find($id);

        if ($book != null) {

            return $this->sendResponse('Books retrieved successfully.', $book);
        }
        return $this->sendError('Book not found!');
    }

    public function searchTitle() {

        $title = Input::get('title');

        $book = $this->bookRepo->findByTitle($title);

        if ($book != null && !$book->isEmpty()) {

            return $this->sendResponse('Books retrieved successfully.', $book);
        }
        return $this->sendError('Book not found!');
    }

    
    public function searchAuthor($author) {

        $book = $this->bookRepo->findByAuthor($author);

            if ($book != null && !$book->isEmpty()) {

            return $this->sendResponse('Books retrieved successfully.', $book);
        }
        return $this->sendError('Book not found!');
    }


     public function searchISBN($isbn) {

            $book = $this->bookRepo->findByISBN($isbn);

            if ($book != null && !$book->isEmpty()) {

                return $this->sendResponse('Book found successfully.', $book);
            }
            return $this->sendError('Book not found!');
        }


    public function lattest() {

        $book = $this->bookRepo->getLattestBooksAdded($id);

        if ($book != null) {

            return $this->sendResponse('Books retrieved successfully.', $book);
        }
        return $this->sendError('Book not found!');
    }

    public function store(Request $request) {

        $input = $request->all();
     
        $validator = Validator::make($request->all(), [
                    'name' => 'required|unique:categories|max:255',
                    'price' => 'integer',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Errors', $validator->errors());
        }

        $book = $this->bookRepo->create($input);

        return $this->sendResponse('Books created successfully.' , $book->toArray());
    }

    public function update(Request $request, $id) {

        $input = $request->all();
        $book = $this->bookRepo->find($id);

        if ($book == null) {
            return $this->sendError('Error', "Book not found!");
        }

        $validator = Validator::make($request->all(), [
                    'name' => 'required|unique:categories|max:255',
                    'price' => 'integer',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Error', $validator->errors());
        }

        $book = $this->bookRepo->update($book, $input);
        
        return $this->sendResponse($book, 'Books updated successfully.');
    }

    public function delete($id) {
        $book = $this->bookRepo->find($id);

        if ($book == null) {
            return $this->sendError('Books not found!');
        }
        $book->delete();
        return $this->sendResponse('Books deleted successfully.');
    }

}
