<?php
namespace AppBundle\Service;

use AppBundle\Entity\Advert;

/**
 * Class GoogleMap
 * @package AppBundle\Service
 */
class GoogleMap
{
    /**
     * @param $address
     * @param $zipcode
     * @param $city
     * @return int
     */
    public function getLatLng($address, $zipcode, $city)
    {
        $address = str_replace(" ", "%20", $address);
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $address . "%20" . $zipcode . "%20" . $city . "&key=AIzaSyBPoRjII2N8Ce3xXg3hRshEikPWbDMlGNY";
        $result_string = file_get_contents($url);
        $result = json_decode($result_string, true);
        if (isset($result['results'][0])) {
            $location['lat'] = $result['results'][0]['geometry']['location']['lat'];
            $location['lng'] = $result['results'][0]['geometry']['location']['lng'];
            return $location;
        } else {
            return $location = 500;
        }
    }
}