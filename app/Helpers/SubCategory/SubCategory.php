<?php

namespace App\Helpers\SubCategory;

use App\Interfaces\CrudInterface;
use App\Models\SubCategory as ModelsSubCategory;
use Exception;

class SubCategory implements CrudInterface
{
  
    public function getAll()
    {
        return ModelsSubCategory::orderBy('id', 'desc')->get();
    }
    public function add($data)
    {
        try {
            return ModelsSubCategory::create($data);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function findById($id)
    {
        return ModelsSubCategory::find($id);
    }
    public function update($data,$id)
    {
        try {
            return ModelsSubCategory::where('id',$id)->update($data);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function delete($id)
    {
        return ModelsSubCategory::where('id',$id)->delete();
    }
}
