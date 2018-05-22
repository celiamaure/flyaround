<?php

namespace AppBundle\Service;

class FlightInfo
{
    /**
     * @var string
     */
    private $unit;
    private $timeUnit;

    /**
     * Constructor
     *
     * @param string $unit Defined in config.yml
     */
    public function __construct($unit, $timeUnit)
    {
        $this->unit = $unit;
        $this->timeUnit = $timeUnit;
    }

    /**
     * Distance calculation between latitude/longitude
     *
     * @param float $latitudeFrom  Departure
     * @param float $longitudeFrom Departure
     * @param float $latitudeTo    Arrival
     * @param float $longitudeTo   Arrival
     *
     * @return float
     */
    public function getDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo)
    {
        $d = 0;
        $earth_radius = 6371;
        $dLat = deg2rad($latitudeTo - $latitudeFrom);
        $dLon = deg2rad($longitudeTo - $longitudeFrom);

        $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * sin($dLon/2) * sin($dLon/2);
        $c = 2 * asin(sqrt($a));

        switch ($this->unit) {
            case 'km':
                $d = $c * $earth_radius;
                break;
            case 'mi':
                $d = $c * $earth_radius / 1.609344;
                break;
            case 'nmi':
                $d = $c * $earth_radius / 1.852;
                break;
        }

        return $d;
    }

    /**
     * Duration calculation
     *
     * @param float $cruiseSpeed  CruiseSpeed
     * @param float $distance Distance
     *
     * @return float
     */
    public function getTime($cruiseSpeed, $distance)
    {
        $time = $cruiseSpeed / $distance;

        switch ($this->timeUnit) {
            case 'min':
                $t = $time / 60;
                break;
        }
        return $time;
    }
}