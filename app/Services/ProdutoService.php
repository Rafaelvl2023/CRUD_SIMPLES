<?php

namespace App\Services;

use App\Repositories\ProdutoRepositoryInterface;

class ProdutoService
{
    protected $produtoRepository;

    public function __construct(ProdutoRepositoryInterface $produtoRepository)
    {
        $this->produtoRepository = $produtoRepository;
    }

    public function getAll()
    {
        return $this->produtoRepository->all();
    }

    public function find($id)
    {
        return $this->produtoRepository->find($id);
    }

    public function create(array $attributes)
    {
        return $this->produtoRepository->create($attributes);
    }

    public function update($id, array $attributes)
    {
        return $this->produtoRepository->update($id, $attributes);
    }

    public function delete($id)
    {
        $this->produtoRepository->delete($id);
    }
}
