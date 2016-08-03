<?php

namespace App\Cesudesk\Execucao;

interface ExecucaoRepositoryContract
{
    public function getAll();
    public function find($id);
    public function save($execucao);
    public function update($execucao, $id);
    public function store($execucao);
    public function delete($id);
}
