<?php

namespace App\Repositories;
use App\Interfaces\PublisherRepositoryInterface;
use App\Models\Publisher;

class PublisherRepository implements PublisherRepositoryInterface{

    public function __construct(Publisher $publisher){
        $this->publisher = $publisher;
    }

    public function getAllPublishers(){
        return $this->publisher::where('is_deleted', '0')->get();
    }

    public function getPublisherById($publisherId){
        return $this->publisher->find($publisherId);
    }

    public function deletePublisher($publisherId){
        $publisher = $this->publisher->find($publisherId);
        $publisher->is_deleted = 1;
        return $publisher->save();
    }

    public function storePublisher(array $publisherDetails){
       // print_r($publisherDetails);exit;
        return $this->publisher->create($publisherDetails);
    }

    public function updatePublisher($publisherId, array $newDetails){

        $this->publisher->find($publisherId);
        $this->publisher->name = $newDetails['name'];
        $this->publisher->save();
    }
}
