<?php


namespace Hsy\Ngn;


class Center
{
    public function search($preNumber, $midNumber, $number)
    {
        $driver = $this->makeQueryDriver($preNumber, $midNumber);

        $response = $driver->query($number);

        return $response;

    }

    private function makeQueryDriver($preNumber, $midNumber)
    {
        $config = $this->getConfig($preNumber, $midNumber);

        return new QueryDriver($config);
    }
}
