<?php


namespace Hsy\Ngn;


class SearchResponse
{
    public $preNumber;
    public $midNumber;
    public $number;
    public $category;
    public $price;
    public $status;

    const STATUS_FREE="green";
    const STATUS_REGISTERED="red";
    const STATUS_RESERVED="orange";
    const STATUS_UNKNOWN="gray";

    public function toArray()
    {
        return [
            "pre_number"=>$this->preNumber,
            "mid_number"=>$this->midNumber,
            "number"=>$this->number,
            "price"=>$this->price,
            "status"=>$this->status,
            "category"=>$this->category,
        ];
    }

}
