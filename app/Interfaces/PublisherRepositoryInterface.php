<?php

namespace App\Interfaces;

interface PublisherRepositoryInterface
{
    public function getAllPublishers();
    public function getPublisherById($publisherId);
    public function deletePublisher($publisherId);
    public function storePublisher(array $publisherDetails);
    public function updatePublisher($publisherId, array $newDetails);
}
