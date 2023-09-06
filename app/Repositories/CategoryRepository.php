<?php

namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface {

    public function __construct(Category $category) {
        $this->category = $category;
    }

    public function getAllCategories() {
        return $this->category->get();
    }

    public function getCategoryById($categoryId) {
        return $this->category->find($categoryId);
    }

    public function deleteCategory($categoryId) {
        $category = $this->category->find($categoryId);
        return $category->delete();
    }

    public function storeCategory(array $categoryDetails) {
        $this->category->create($categoryDetails);
    }

    public function updateCategory($categoryId, array $categoryDetails) {
        $category = $this->category->find($categoryId);
        $category->name = $categoryDetails['name'];
        $category->save();
    }
}
