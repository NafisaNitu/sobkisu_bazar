<?php

namespace App\Interfaces;

interface CrudInterface
{
    public function getAll();
    public function findById($id);
    public function add($data);
    public function update($data,$id);
    public function delete($id);
}
