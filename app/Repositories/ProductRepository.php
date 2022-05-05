<?php


namespace App\Repositories;


use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{

    public function __construct(private Product $model){}

    public function all()
    {
        return $this->model::paginate(10);
    }

    public function byId($id)
    {
        return $this->model->findOrFail($id);
    }

    public function delete($id)
    {
        $this->model->destroy($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        return $this->model->where('id', '=', $id)->update($data);
    }

}
