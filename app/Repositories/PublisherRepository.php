<?php

namespace App\Repositories;
use App\Interfaces\PublisherRepositoryInterface;
use App\Models\Publisher;

class PublisherRepository implements PublisherRepositoryInterface{

    public function __construct(Publisher $publisher){
        $this->publisher = $publisher;
    }

    public function getAllPublishers(){
        return $this->publisher->get(); //to get deleted data we can use withTrashed (eg : $this->publisher->withTrashed()->get())
    }

    public function getPublisherById($publisherId){
        return $this->publisher->find($publisherId);
    }

    public function deletePublisher($publisherId){
        $publisher = $this->publisher->find($publisherId);
        return $publisher->delete();
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
