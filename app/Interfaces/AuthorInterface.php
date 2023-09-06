<?php

namespace App\Interfaces;

interface AuthorRepositoryInterface {
    public function getAllAuthors();
    public function getAuthorById($authorId);
    public function deleteAuthor($authorId);
    public function storeAuthor(array $authorDetails);
    public function updateAuthor($authorId, array $newDetails);
}
