<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\EnderecoRepository;
use App\Repositories\ClienteRepository;
use App\Models\Endereco;


class EnderecoController extends Controller
{
    protected $repository;
    public function __construct(){
        $this->repository = new EnderecoRepository();
        }
        
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->repository->selectAllWith(['cliente']);
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $objCliente = (new ClienteRepository())->findById($request->cliente_id);
        if(isset($objCliente)) {
            $obj = new Endereco();
            $obj->cep = $request->cep;
            $obj->rua = mb_strtoupper($request->rua, 'UTF-8');
            $obj->bairro = mb_strtoupper($request->bairro, 'UTF-8');
            $obj->cidade = mb_strtoupper($request->cidade, 'UTF-8');
            $obj->estado = mb_strtoupper($request->estado, 'UTF-8');
            $obj->numero = $request->numero;
            $obj->complemento = mb_strtoupper($request->complemento, 'UTF-8');
            $obj->cliente()->associate($objCliente);
            $this->repository->save($obj);
            return "<h1>Store - OK!</h1>";
        }
        return "<h1>Store - Endereco não encontrado!</h1>";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = $this->repository->findById($id);
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $obj = $this->repository->findById($id);
        $objCliente = (new ClienteRepository())->findById($request->cliente_id);
        if (isset($obj) && isset($objCliente)) {
            $obj->cep = $request->cep;
            $obj->rua = mb_strtoupper($request->rua, 'UTF-8');
            $obj->bairro = mb_strtoupper($request->bairro, 'UTF-8');
            $obj->cidade = mb_strtoupper($request->cidade, 'UTF-8');
            $obj->estado = mb_strtoupper($request->estado, 'UTF-8');
            $obj->numero = $request->numero;
            $obj->complemento = mb_strtoupper($request->complemento, 'UTF-8');
            $obj->cliente()->associate($objCliente);
            $this->repository->save($obj);
            return "<h1>Update - OK!</h1>";
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if($this->repository->delete($id)) {
            return "<h1>Delete - OK!</h1>";
        }
        return "<h1>Delete - Endereco não encontrado!</h1>";
    }
}
