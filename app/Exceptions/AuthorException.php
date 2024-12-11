<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log; // Import the Log facade

class AuthorException extends Exception
{

   /* public static function log($message)
    {
        Log::error("Author Exception: $message");
    }

    public static function authorNotCreated()
    {
        return 'Author not created';
    }


    public static function authorNotFound()
    {
        return new static('Author not found');
    }

    public static function authorNotUpdated()
    {
        return 'Author not updated';
    }

    public static function authorNotDeleted()
    {
        return 'Author not deleted';
    }*/

   // protected $message = 'Author not found.';
}
