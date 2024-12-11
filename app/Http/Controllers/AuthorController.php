<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Interfaces\AuthorRepositoryInterface;
use App\Exceptions\AuthorException;
use Illuminate\Http\Response;

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
        try{
            $data = array(
                'name' => $request->name,
            );

            $this->authorRepository->storeAuthor($data);
            session()->flash("success","author Created Successfully ");
            return redirect()->route('authors.create');

        }catch(AuthorException $e){
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try{
            $author =  $this->authorRepository->getAuthorById($id);
            return view('author.edit',['author'=>$author]);
        }catch (\Exception $e) {
            abort(Response::HTTP_NOT_FOUND, 'The invitation token is invalid.');
            //return view('errors.404', ['message' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $data = array(
                'name' => $request->name,
            );
            $this->authorRepository->updateAuthor($id,$data);
            session()->flash("success","Author Updated Successfully ");
            return redirect()->route('authors');

        } catch (AuthorException $e) {
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        try{
            $author = $this->authorRepository->deleteAuthor($id);
            session()->flash("success","Author Deleted Successfully ");
            return redirect()->route('authors');
        }catch (AuthorException $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function view($id)
    {
        $author =  $this->authorRepository->getAuthorById($id);
        $book =  $author->book;
        return view('author.view',$book);
    }

    //listing (List out paticular authors all books)
    // 1 book = 1 author (harry tter 1 = jk rowling)
    //1 author - many books (jk rowling = hp1,hp2 ...)
}
