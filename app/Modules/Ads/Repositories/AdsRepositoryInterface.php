<?php

namespace Ads\Repositories;

interface AdsRepositoryInterface
{
    public function allData();

    public function dataWithConditions($conditions);

    public function getDataId($id);

    public function saveData($request, $id = null);

    public function deleteData($id);

    public function categories();

    public function tags();

    public function adTags($id);

    public function advertiser($id);
}
