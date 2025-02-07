<?php

namespace App\Repositories;
use App\Models\Endereco;

class EnderecoRepository extends Repository {
    public function __construct() {
        parent::__construct(new Endereco());
    }
    public function selectAllWith(array $orm) {
        return $this->model::with($orm)->get();
    }
}