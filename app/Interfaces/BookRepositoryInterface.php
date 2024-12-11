<?php

namespace App\Interfaces;

interface BookRepositoryInterface {
    public function getAllBooks();
    public function getBookById($bookId);
    public function deleteBook($bookId);
    public function storeBook(array $bookDetails);
    public function updateBook($bookId, array $newDetails);
}
