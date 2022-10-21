<?php
namespace App\Repository;

interface ICategoryRepository {
    public function getAllCategory();
    public function getSingleCategory($id);
    public function createCategory(array $data);
    public function updateCategory(array $data, $id);
    public function deleteCategory($id);
}

?>