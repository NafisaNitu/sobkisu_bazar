<?php

namespace App\Helpers\Category;

use App\Interfaces\CrudInterface;
use App\Models\Category as ModelsCategory;
use Exception;
use Illuminate\Support\Facades\DB;

class Category implements CrudInterface
{
    public function getAll()
    {
        return ModelsCategory::orderBy('id', 'desc')->get();
    }
    public function add($data)
    {

        try {
            return ModelsCategory::create($data);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function findById($id)
    {
        return ModelsCategory::find($id);
    }
    public function update($data,$id)
    {
        try {
            return ModelsCategory::where('id',$id)->update($data);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function delete($id)
    {
        return ModelsCategory::where('id',$id)->delete();
    }
}
