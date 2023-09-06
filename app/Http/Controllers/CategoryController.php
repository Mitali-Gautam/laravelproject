<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorecategoryRequest;
use App\Http\Requests\UpdatecategoryRequest;
use App\Interfaces\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository) {
        $this->categoryRepository = $categoryRepository;
    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->categoryRepository->getAllCategories();
        return view('category.index',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = array(
            'name' => $request->name,
        );

        $this->categoryRepository->storeCategory($data);
        session()->flash("success","Category Created Successfully ");

        return redirect()->route('categories.create');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category =  $this->categoryRepository->getCategoryById($id);
        return view('category.edit',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = array(
            'name' => $request->name,
        );
        $this->categoryRepository->updateCategory($id,$data);
        session()->flash("success","Category Updated Successfully ");
        return redirect()->route('categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $category = $this->categoryRepository->deleteCategory($id);
        session()->flash("success","Category Deleted Successfully ");
        return redirect()->route('categories');
    }
}
