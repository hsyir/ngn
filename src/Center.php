<?php


namespace Hsy\Ngn;


class Center
{
    public function search($preNumber, $midNumber, $number)
    {
        $driver = $this->makeQueryDriver($preNumber, $midNumber);

        $response = $driver->query($preNumber, $midNumber, $number);

        return $response;

    }

    private function makeQueryDriver($preNumber, $midNumber)
    {
        $driverName = $this->getDriverName($preNumber, $midNumber);

        if (!$driverName)
            throw new \Exception("PreNumber Not Defined");

        $driverClass = config("ngn.class-map." . $driverName);

        if (!$driverClass or !class_exists($driverClass))
            throw new \Exception("Driver Class Not Found: " . $driverClass);

        return new $driverClass;
    }

    private function getDriverName($preNumber, $midNumber)
    {
        $drivers = config("ngn.drivers");

        $number = $preNumber . $midNumber;

        $matches = collect($drivers)->filter(function ($numbers) use ($number) {
            return in_array($number, $numbers);
        });

        return count($matches) > 0
            ? $matches->keys()->first()
            : null;
    }

}
