<?php

namespace Bredala\Geo\Osm;

/**
 * Gps
 */
class Tile
{

    public $x;
    public $y;
    public $zoom;

    /**
     * @return \Bredala\Geo\Osm\Gps
     */
    public function toGps(): Gps
    {
        $n = pow(2, $this->zoom);

        $gps       = new Gps();
        $gps->zoom = $this->zoom;
        $gps->lon  = $this->x / $n * 360.0 - 180.0;
        $gps->lat  = rad2deg(atan(sinh(pi() * (1 - 2 * $this->y / $n))));

        return $gps;
    }
}
