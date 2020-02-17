<?php

/*Contains core static function used in the app */
class core
{
    /* Constants used throughout application are defined here */

    /* Earth radius in miles */
    protected $EARTH_RAD = 3959;

    /* Latitude and longitude of London our target city*/
    protected $LONDON_LAT = 51.509865;
    protected $LONDON_LONG = -0.118092;

    /* API URL */
    protected $api_url = "https://bpdts-test-app.herokuapp.com/";

    /**
     * Calculates the great circle distance between two points, with
     * the Haversine formula.
     * @param float $lat_from Latitude of start point in [deg decimal]
     * @param float $long_from Longitude of start point in [deg decimal]
     * @param float $lat_to Latitude of target point in [deg decimal]
     * @param float $long_to Longitude of target point in [deg decimal]
     * @return float Distance between points in [mi] (same as earthRadius)
     */
    protected function distance_calc($lat_from, $long_from, $lat_to, $long_to){
        // convert from degrees to radians
        $lat_from = deg2rad($lat_from);
        $long_from = deg2rad($long_from);
        $lat_to = deg2rad($lat_to);
        $long_to = deg2rad($long_to);

        $lat_delta = $lat_to - $lat_from;
        $lon_delta = $long_to - $long_from;

        $angle = 2 * asin(sqrt(pow(sin($lat_delta / 2), 2) +
                cos($lat_from) * cos($lat_to) * pow(sin($lon_delta / 2), 2)));
        return $angle * $this->EARTH_RAD;

    }


}
