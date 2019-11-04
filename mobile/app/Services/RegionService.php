<?php

namespace App\Services;

class RegionService
{
    private $regionRepository;

    public function __construct(\App\Repositories\Region\RegionRepository $regionRepository)
    {
        $this->regionRepository = $regionRepository;
    }

    public function regionList($args)
    {
        $list = $this->regionRepository->getRegionAll($args);
        return $list;
    }
}
