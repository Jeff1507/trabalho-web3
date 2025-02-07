<?php

namespace App\Repositories;
use App\Models\Cliente;

class ClienteRepository extends Repository {
    public function __construct() {
        parent::__construct(new Cliente());
    }
}