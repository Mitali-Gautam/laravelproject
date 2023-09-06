<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePublisherRequest;
use App\Http\Requests\UpdatePublisherRequest;
use App\Interfaces\PublisherRepositoryInterface;

class PublisherController extends Controller
{

    private PublisherRepositoryInterface $publisherRepository;

    public function __construct(PublisherRepositoryInterface $publisherRepository){
        $this->publisherRepository = $publisherRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishers = $this->publisherRepository->getAllPublishers();
        return view('publisher.index',['publishers' => $publishers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publisher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    //public function store(StorePublisherRequest $request)
    public function store(Request $request)
    {
        $data = array(
            'name' => $request->name,
        );

        $this->publisherRepository->storePublisher($data);
        session()->flash("success","Publisher Created Successfully");
        return redirect()->route('publishers');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $publisher =  $this->publisherRepository->getPublisherById($id);
        return view('publisher.view',['publisher'=>$publisher]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $publisher = $this->publisherRepository->getPublisherById($id);
        return view('publisher.edit',['publisher'=>$publisher]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    //public function update(UpdatePublisherRequest $request, Publisher $publisher)
    {
        $data = array(
            'name' => $request->name,
        );
        $this->publisherRepository->updatePublisher($id, $data);

        session()->flash("success","Publisher Updated Successfully");
        return redirect()->route("publishers");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $this->publisherRepository->deletePublisher($id);
        session()->flash("success","Publisher Deleted Successfully");
        return redirect()->route("publishers");
    }
}
