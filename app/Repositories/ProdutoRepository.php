<?php

namespace App\Repositories;

use App\Models\Produto;

class ProdutoRepository implements ProdutoRepositoryInterface
{
    public function all()
    {
        return Produto::all();
    }

    public function find($id)
    {
        return Produto::findOrFail($id);
    }

    public function create(array $attributes)
    {
        return Produto::create($attributes);
    }

    public function update($id, array $attributes)
    {
        $produto = $this->find($id);
        $produto->update($attributes);
        return $produto;
    }

    public function delete($id)
    {
        $produto = $this->find($id);
        $produto->delete();
    }
}
