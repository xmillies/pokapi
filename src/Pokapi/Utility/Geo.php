<?php
namespace Pokapi\Utility;

/**
 * Geo utility class
 * Source: https://github.com/AHAAAAAAA/PokemonGo-Map
 *
 * @package Pokapi\Utility
 */
class Geo
{

    const EARTH_RADIUS_METERS = 6367000.0;

    const BEARING_NORTH = 0;
    const BEARING_EAST = 90;
    const BEARING_SOUTH = 180;
    const BEARING_WEST = 270;

    /**
     * Calculate new coordinates based on distance and bearing
     *
     * @param float $initialLatitude
     * @param float $initialLongitude
     * @param float $distance
     * @param int $bearing
     *
     * @return array
     */
    public static function calculateNewCoordinates(float $initialLatitude, float $initialLongitude, float $distance, int $bearing)
    {
        $bearing = deg2rad($bearing);
        $latitude = deg2rad($initialLatitude);
        $longitude = deg2rad($initialLongitude);
        $earth = self::EARTH_RADIUS_METERS / 1000;

        $newLatitude = asin(
            sin($latitude) * cos($distance/$earth) +
            cos($latitude) * sin($distance/$earth) * cos($bearing)
        );

        $newLongitude = $longitude + atan2(
                sin($bearing) * sin($distance/$earth) * cos($latitude),
                cos($distance/$earth)-sin($latitude)*sin($newLatitude)
            );

        return [rad2deg($newLatitude), rad2deg($newLongitude)];
    }

    /**
     * Generate steps
     *
     * @param float $latitude
     * @param float $longitude
     * @param int $steps
     * @return array
     */
    public static function generateSteps(float $latitude, float $longitude, int $steps)
    {
        $result = [[
            $latitude,
            $longitude,
            self::BEARING_NORTH
        ]];
        $pulse = 0.1; // 100 Meters
        $xDistance = sqrt(3) * $pulse;
        $yDistance = 3 * ($pulse / 2);
        $location = [$latitude, $longitude];

        for ($step = 1; $step < $steps; $step++) {
            $location = self::calculateNewCoordinates($location[0], $location[1], $yDistance, self::BEARING_NORTH);
            $location = self::calculateNewCoordinates($location[0], $location[1], $xDistance / 2, self::BEARING_WEST);

            for ($direction = 0; $direction < 6; $direction++) {
                for ($s = 0; $s < $step; $s++){
                    switch($direction) {
                        case 0:
                            $location = self::calculateNewCoordinates($location[0], $location[1], $xDistance, self::BEARING_EAST);
                            break;
                        case 1:
                            $location = self::calculateNewCoordinates($location[0], $location[1], $yDistance, self::BEARING_SOUTH);
                            $location = self::calculateNewCoordinates($location[0], $location[1], $xDistance / 2, self::BEARING_EAST);
                            break;
                        case 2:
                            $location = self::calculateNewCoordinates($location[0], $location[1], $yDistance, self::BEARING_SOUTH);
                            $location = self::calculateNewCoordinates($location[0], $location[1], $xDistance / 2, self::BEARING_WEST);
                            break;
                        case 3:
                            $location = self::calculateNewCoordinates($location[0], $location[1], $xDistance, self::BEARING_WEST);
                            break;
                        case 4:
                            $location = self::calculateNewCoordinates($location[0], $location[1], $yDistance, self::BEARING_NORTH);
                            $location = self::calculateNewCoordinates($location[0], $location[1], $xDistance / 2, self::BEARING_WEST);
                            break;
                        case 5:
                            $location = self::calculateNewCoordinates($location[0], $location[1], $yDistance, self::BEARING_NORTH);
                            $location = self::calculateNewCoordinates($location[0], $location[1], $xDistance / 2, self::BEARING_EAST);
                            break;
                    }

                    $result[] = [
                        $location[0],
                        $location[1],
                        self::BEARING_NORTH
                    ];
                }
            }
        }

        return $result;
    }
}
