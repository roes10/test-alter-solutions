<?php


namespace App\Repositories;


interface CategoryRepositoryInterface
{
    public function all();
    public function byId($id);
    public function delete($id);
    public function create(array $data);
    public function update($id, array $data);
}
