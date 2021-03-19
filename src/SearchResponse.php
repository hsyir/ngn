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
            "status"=>self::STATUS_UNKNOWN,
            "category"=>$this->category,
        ];
    }

}




0219109
0359109
0519109
0769109
0779109
0349109
0319109
0719109
0219155
0219101
0219130
0719101
0719130
0269101
0269130
0319101
0419101
0259101
0519101
0779101
0779130
0749101
0549101
0569101
0289101
0389101
0839101
0239101
0449101
0879101
0249101
0589101
0459101
0619101
0819101
0349101
0669101
0139101
0769101
0359101
0119101
0179101
0869101
0849101
