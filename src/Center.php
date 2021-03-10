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

        $driverClassName = $this->makeDriverClassName($driverName);

        if (!class_exists($driverClassName))
            throw new \Exception("Driver Class Not Found: " . $driverClassName);

        return new $driverClassName;
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

    /**
     * @param $driverName
     * @return string
     */
    private function makeDriverClassName($driverName): string
    {
        return "\\Hsy\\Ngn\\Drivers\\" . ucfirst($driverName)."Driver";
    }
}
