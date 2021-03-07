<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\UserLogRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Book;

class UserController extends BaseController {

    private $userLogRepo;
    private $userRepo;

    public function __construct(UserLogRepositoryInterface $userLogRepository,UserRepositoryInterface $userRepository) {
        $this->userLogRepo = $userLogRepository;
        $this->userRepo = $userRepository;
    }

    public function index() {

         $data = $this->userRepo->all(); 

        return $this->sendResponse('Your selected books.' , $data);
    }

    public function checkIn(Request $request) {

        $input = $request->all();

        if(!isset($input['book_id']) || empty($input['book_id'])){

                return $this->sendResponse('Please select any book.');

        }

        $book = Book::find($input['book_id']);

        if (!$book) {

                return $this->sendResponse('Book not found.');
         }
    
        if ($book->status_id != 1) {

                return $this->sendResponse('Book already reserved.');
         }

        $result = $this->userLogRepo->checkInBook($book);

        return $this->sendResponse('Booked reserved successfully.', $result);


    }

      public function checkOut(Request $request) {

        $input = $request->all();

        $book = Book::find($input['book_id']);

        if(!isset($input['book_id']) || empty($input['book_id'])){

                return $this->sendResponse('Please select any book.');

        }

        if (!$book) {

                return $this->sendResponse('Book not found.');
         }


        if ($book->status_id == 1) {

                return $this->sendResponse('Book already available for reservation.');
         }

        $result = $this->userLogRepo->checkOutBook($book);

        return $this->sendResponse('Booked checkedout successfully.', $book);


    }


}
