<?php

namespace App\Services;

interface ServiceInterface
{
    public function all();
    public function find($id);
    public function create(array $data);
    public function update(array $data, $id);
    public function delete($id);
    public function searchAndPaginate($searchBy, $keyword, $perPage = 10);
}
