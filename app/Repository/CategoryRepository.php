<?php
namespace App\Repository;

use App\Models\Category;
use DB;

class CategoryRepository implements ICategoryRepository {

    public function getAllCategory(){
        return Category::all();
    }

    public function getSingleCategory($id){
        return Category::find($id);
    }

    public function createCategory(array $data){
        $category = new Category;
        $category->category_name = $data['category_name'];
        $category->save();
    }

    public function updateCategory(array $data, $id){
        $category = array();
        $category['category_name'] =  $data['category_name'];
        DB::table('categories')->where('id',$id)->update($category);
    }
    public function deleteCategory($id){
        DB::table('categories')->where('id',$id)->delete();
    }

}


?>