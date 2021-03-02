<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\UserLogRepositoryInterface;
use Illuminate\Support\Facades\Validator;

class ReserveBookController extends BaseController {

    private $userLogRepo;

    public function __construct(UserLogRepositoryInterface $userLogRepository) {
        $this->userLogRepo = $userLogRepository;
    }

    public function index() {

        $books = $this->userLogRepo->all();

        return $this->sendResponse('Booked books retrieved successfully.', $books->toArray());
    }

    public function checkIn($id) {

        $input = $request->all();

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
