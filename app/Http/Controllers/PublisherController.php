<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;
use App\Http\Requests\StorePublisherRequest;
use App\Http\Requests\UpdatePublisherRequest;

class PublisherController extends Controller
{

    public function __construct(Publisher $publisher){
        $this->publisher = $publisher;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishers = Publisher::where('is_deleted', '0')->get();
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
        $this->publisher->name = $request->name;
        $this->publisher->save();
        session()->flash("success","Publisher Created Successfully");

        return redirect()->route('publishers');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $publisher = $this->publisher->find($id);
        return view('publisher.view',['publisher'=>$publisher]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $publisher = $this->publisher->find($id);
        return view('publisher.edit',['publisher'=>$publisher]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    //public function update(UpdatePublisherRequest $request, Publisher $publisher)
    {
        $publisher = $this->publisher->find($id);
        $publisher->name = $request->name;
        $publisher->save();

        session()->flash("success","Publisher Updated Successfully");
        return redirect()->route("publishers");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $publisher = $this->publisher->find($id);
        $publisher->is_deleted = 1;
        $publisher->save();

        session()->flash("success","Publisher Deleted Successfully");
        return redirect()->route("publishers");
    }
}
