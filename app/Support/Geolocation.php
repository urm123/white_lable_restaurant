<?php
/**
 * Created by PhpStorm.
 * User: janaka
 * Date: 05/03/19
 * Time: 11:44 AM
 */

namespace App\Support;

/**
 * Class Geolocation
 * @package App\Support
 */
class Geolocation
{
    /**
     * @param string $restaurant_address
     * @param string $user_address
     * @return float|int
     */
    public function getDistance(string $restaurant_address, string $user_address)
    {
        $user_location = $this->get($user_address);
        $restaurant_location = $this->get($restaurant_address);

        $latitude1 = $restaurant_location['latitude'];
        $longitude1 = $restaurant_location['longitude'];

        $latitude2 = $user_location['latitude'];
        $longitude2 = $user_location['longitude'];

//        $dLat = deg2rad($latitude2 - $latitude1);
//        $dLon = deg2rad($longitude2 - $longitude1);
        try {
            $data = file_get_contents(rawurldecode('https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins=' . $latitude2 . ',' . $longitude2 . '&destinations=' . $latitude1 . ',' . $longitude1 . '&key=AIzaSyDMmh5_cXi0BhsrRQ58W-wQDPFYqlXrgUQ'));
        } catch (\Exception $exception) {
            $data = [];
        }

        $distance = 'Not Available';

        if ($data) {
            $output = json_decode($data);

            if (!empty($output->rows)) {
                if (!empty($output->rows[0]->elements)) {
                    if (!empty($output->rows[0]->elements[0]->distance)) {
                        $distance = $output->rows[0]->elements[0]->distance->text;
                    }
                }
            }
        }

        return $distance;


//        $earth_radius = 6371;


//        $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon / 2) * sin($dLon / 2);
//
//        $c = 2 * asin(sqrt($a));
//
//        $d = $earth_radius * $c;

//        return $d;
    }

    /**
     * @param string $address
     * @return array
     */
    public function get(string $address)
    {
        $address = str_replace([' ', '#'], ['+', '%23'], $address);
        $address = str_replace('#', '%23', $address);

        try {
            $data = file_get_contents(rawurldecode('https://maps.google.com/maps/api/geocode/json?address=' . $address . '&sensor=false&key=AIzaSyC7sUyo0PUafeP9J9M0_Y0ke3xNLn841kk'));
        } catch (\Exception $exception) {
            $data = [];
        }

        if ($data) {

            $output = json_decode($data);

            if (!empty($output->results)) {
                $latitude = $output->results[0]->geometry->location->lat;
                $longitude = $output->results[0]->geometry->location->lng;
            } else {
                $latitude = 0.0;
                $longitude = 0.0;
            }

            return [
                'latitude' => $latitude,
                'longitude' => $longitude,
            ];
        } else {
            return [
                'latitude' => 0,
                'longitude' => 0,
            ];
        }
    }

    /**
     * @param $address
     * @return string
     */
    public function getPostCode($address)
    {
        $address = str_replace(' ', '+', $address);
        try {
            $data = file_get_contents(rawurldecode('https://maps.google.com/maps/api/geocode/json?address=' . $address . '&sensor=false&key=AIzaSyC7sUyo0PUafeP9J9M0_Y0ke3xNLn841kk'));
        } catch (\Exception $exception) {
            $data = [];
        }

        if ($data) {

            $output = json_decode($data);

            if (!empty($output->results)) {

                $address_components = $output->results[0]->address_components;

                $post_code = '';

                foreach ($address_components as $address_component) {
                    $types = $address_component->types;
                    foreach ($types as $type) {
                        if ($type == 'postal_code') {
                            $post_code = $address_component->long_name;
                        }
                    }
                }

                return $post_code;
            } else {
                return '';
            }
        } else {
            return '';
        }
    }
}
