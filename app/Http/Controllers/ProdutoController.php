<?php

namespace App\Http\Controllers;

use App\Services\ProdutoService;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    protected $produtoService;

    public function __construct(ProdutoService $produtoService)
    {
        $this->produtoService = $produtoService;
        $this->middleware('csrf', ['except' => ['store', 'update']]);
    }

    public function index()
    {
        $produtos = $this->produtoService->getAll();
        return response()->json($produtos);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric',
        ]);

        $produto = $this->produtoService->create($validated);
        return response()->json($produto, 201);
    }

    public function show($id)
    {
        $produto = $this->produtoService->find($id);
        return response()->json($produto);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nome' => 'sometimes|required|string|max:255',
            'preco' => 'sometimes|required|numeric',
        ]);

        $produto = $this->produtoService->update($id, $validated);
        return response()->json($produto);
    }

    public function destroy($id)
    {
        $this->produtoService->delete($id);
        return response()->json(null, 204);
    }
}
