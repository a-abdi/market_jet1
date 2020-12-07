<?php

namespace App\Contracts\Repositories;


interface EloquentRepositoryInterface
{
    public function all();
    
    public function create(array $data);
    
    public function delete($id);
    
    public function find($id);

    public function update(array $data, $id);

    public function select(array $type);

    public function search(array $data, $value, $type);
}