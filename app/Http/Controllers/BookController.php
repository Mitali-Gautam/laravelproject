<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Category;
use App\Models\Publisher;
use App\Interfaces\BookRepositoryInterface;


class BookController extends Controller
{
    private BookRepositoryInterface $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository) {
        $this->bookRepository = $bookRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = $this->bookRepository->getAllBooks();
        return view('book.index',['books'=>$books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = array(
            'authors' => Author::latest()->get(),
            'publishers' => Publisher::latest()->get(),
            'categories' => Category::latest()->get(),
        );
        return view('book.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = array(
            'name' => $request->name,
            'author_id' => $request->author_id,
            'category_id' => $request->category_id,
            'publisher_id' => $request->publisher_id,
            'status' => 'Y'
        );

        $this->bookRepository->storeBook($data);
        session()->flash("success","Book Created Successfully ");
        return redirect()->route('book.create');

    }

    /**
     * Display the specified resource.
     */
    public function view($id)
    {
        $book =  $this->bookRepository->getBookById($id);
        $author = $book->author;
        $category =  $book->category;
        $publisher =  $book->publisher;

       echo "<pre>"; print_r(compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('book.edit',[
            'authors' => Author::orderBy('name','asc')->get(),
            'publishers' => Publisher::orderBy('name','asc')->get(),
            'categories' => Category::orderBy('name','asc')->get(),
            'book' => $this->bookRepository->getBookById($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $data = array(
            'name' => $request->name,
            'author_id' => $request->author_id,
            'category_id' => $request->category_id,
            'publisher_id' => $request->publisher_id,
            'status' => 'Y'
        );

        $this->bookRepository->updateBook($id,$data);
        session()->flash("success","Book Updated Successfully ");
        return redirect()->route('books');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
            $book = $this->bookRepository->deleteBook($id);
            session()->flash("success","Book Deleted Successfully ");
            return redirect()->route('books');
    }
}
