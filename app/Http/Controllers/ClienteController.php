<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ClienteRepository;
use App\Models\Cliente;

class ClienteController extends Controller
{
    protected $repository;

    public function __construct() {
        $this->repository = new ClienteRepository();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = $this->repository->selectAll();
        //return $data;
        return view('cliente.index', compact('clientes'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $obj = new Cliente();
        $obj->nome = mb_strtoupper($request->nome, 'UTF-8');
        $obj->telefone = $request->telefone;
        $this->repository->save($obj);
        return "<h1>Store - OK!</h1>";
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
        if(isset($obj)) {
            $obj->nome = mb_strtoupper($request->nome, 'UTF-8');
            $this->repository->save($obj);
            return "<h1>Upate - OK!</h1>";
        }

        return "<h1>Upate - Cliente não encontrado!</h1>";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if($this->repository->delete($id)) {
            return "<h1>Delete - OK!</h1>";
        }
        return "<h1>Upate - Cliente não encontrado!</h1>";
    }
}
