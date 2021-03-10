<?php


namespace Hsy\Ngn\Drivers;


use Hsy\Ngn\SearchResponse;

interface DriverInterface
{
    /**
     * @param $preNumber
     * @param $midNumber
     * @param $number
     * @return SearchResponse
     */
    public function query($preNumber, $midNumber, $number): ?SearchResponse;
}