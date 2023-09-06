<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Interfaces\AuthorRepositoryInterface;

class AuthorController extends Controller
{
    private AuthorRepositoryInterface $authorRepository;

    public function __construct(AuthorRepositoryInterface $authorRepository) {
        $this->authorRepository = $authorRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = $this->authorRepository->getAllAuthors();
        return view('author.index',['authors'=>$authors]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('author.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = array(
            'name' => $request->name,
        );

        $this->authorRepository->storeAuthor($data);
        session()->flash("success","Author Created Successfully ");

        return redirect()->route('authors.create');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $author =  $this->authorRepository->getAuthorById($id);
        return view('author.edit',['author'=>$author]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = array(
            'name' => $request->name,
        );
        $this->authorRepository->updateAuthor($id,$data);
        session()->flash("success","Author Updated Successfully ");
        return redirect()->route('authors');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $author = $this->authorRepository->deleteAuthor($id);
        session()->flash("success","Author Deleted Successfully ");
        return redirect()->route('authors');
    }
}
