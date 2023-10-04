<?php

namespace App\Repositories;

use App\Interfaces\AuthorRepositoryInterface;
use App\Models\Author;
use App\Exceptions\AuthorException;

class AuthorRepository implements AuthorRepositoryInterface {

    public function __construct(Author $author) {
        $this->author = $author;
    }

    public function getAllAuthors() {
        return $this->author->get();
    }

    public function getAuthorById($authorId) {
        $author =  $this->author->findorfail($authorId);
        if(!$author){
            throw new AuthorException();
        }
        return $author;
    }

    public function deleteAuthor($authorId) {
        $author = $this->getAuthorById($authorId);
        return $author->delete();

    }

    public function storeAuthor(array $authorDetails) {
        return $this->author->create($authorDetails);
    }

    public function updateAuthor($authorId, array $authorDetails) {
        $author = $this->getAuthorById($authorId);
        $author->name = $authorDetails['name'];
        $author->save();
    }
}
