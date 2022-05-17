<?php

namespace Categories\Repositories;

interface CategoriesRepositoryInterface
{
    public function allData();

    public function dataWithConditions($conditions);

    public function getDataId($id);

    public function saveData($request, $id = null);

    public function deleteData($id);
}
