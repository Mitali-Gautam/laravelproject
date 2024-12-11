<?php

namespace App\Repositories;

use App\Interfaces\BookRepositoryInterface;
use App\Models\Book;
use App\Exceptions\BookException;

class BookRepository implements BookRepositoryInterface {

    public function __construct(Book $book) {
        $this->book = $book;
    }

    public function getAllBooks() {
        return $this->book->with('author','category', 'publisher')->orderBy('id','desc')->get();
    }

    public function getBookById($bookId) {
        $book =  $this->book->findorfail($bookId);
        if(!$book){
            throw new BookException();
        }
        return $book;
    }

    public function deleteBook($bookId) {
        $book = $this->getBookById($bookId);
        return $book->delete();
    }

    public function storeBook(array $bookDetails) {
        return $this->book->create($bookDetails);
    }

    public function updateBook($bookId, array $bookDetails) {
        $book = $this->getBookById($bookId);
        $book->name = $bookDetails['name'];
        $book->category_id = $bookDetails['category_id'];
        $book->publisher_id = $bookDetails['publisher_id'];
        $book->author_id= $bookDetails['author_id'];
        $book->status= 'Y';
        $book->save();
    }
}
