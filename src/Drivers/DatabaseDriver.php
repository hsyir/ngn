<?php


namespace Hsy\Ngn\Drivers;


use Hsy\Ngn\Models\Number;
use Hsy\Ngn\SearchResponse;

class DatabaseDriver implements DriverInterface
{

    /**
     * @param $preNumber
     * @param $midNumber
     * @param $number
     * @return SearchResponse
     */
    public function query($preNumber, $midNumber, $number): ?SearchResponse
    {
        $number = Number
            ::wherePreNumber($preNumber)
            ->whereMidNumber($midNumber)
            ->whereNumber($number)
            ->first();


        return $number ? $this->setSearchResponse($number) : null;
    }

    private function setSearchResponse($number)
    {
        $searchResponse = new SearchResponse();

        if (!$number) {
            return $searchResponse;
        }

        $searchResponse->preNumber = $number->pre_number;
        $searchResponse->midNumber = $number->mid_number;
        $searchResponse->category = $number->category;
        $searchResponse->status = $searchResponse::STATUS_UNKNOWN;
        return $searchResponse;
    }


}
