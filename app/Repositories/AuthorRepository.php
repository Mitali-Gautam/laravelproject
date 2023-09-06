<?php

namespace App\Repositories;

use App\Interfaces\AuthorRepositoryInterface;
use App\Models\Author;

class AuthorRepository implements AuthorRepositoryInterface {

    public function __construct(Author $author) {
        $this->author = $author;
    }

    public function getAllAuthors() {
        return $this->author->get();
    }

    public function getAuthorById($authorId) {
        return $this->author->find($authorId);
    }

    public function deleteAuthor($authorId) {
        $author = $this->author->find($authorId);
        return $author->delete();
    }

    public function storeAuthor(array $authorDetails) {
        $this->author->create($authorDetails);
    }

    public function updateAuthor($authorId, array $authorDetails) {
        $author = $this->author->find($authorId);
        $author->name = $authorDetails['name'];
        $author->save();
    }
}
