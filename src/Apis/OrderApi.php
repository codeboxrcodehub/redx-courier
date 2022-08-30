<?php

namespace Codeboxr\RedxCourier\Apis;

use GuzzleHttp\Exception\GuzzleException;
use Codeboxr\RedxCourier\Exceptions\RedxException;

class OrderApi extends BaseApi
{
    /**
     * Order Create
     *
     * @param array $array
     *
     * @return mixed
     * @throws RedxException
     * @throws GuzzleException
     */
    public function create($array)
    {
        $response = $this->authorization()->send("POST", "v1.0.0-beta/parcel", $array);
        return $response;
    }

    /**
     * Order Details
     *
     * @param string $trackingId
     *
     * @return mixed
     * @throws GuzzleException
     * @throws RedxException
     */
    public function orderDetails($trackingId)
    {
        $response = $this->authorization()->send("GET", "v1.0.0-beta/parcel/info/{$trackingId}");
        return $response->parcel;
    }

    /**
     * Parcel tracking
     *
     * @param string $trackingId
     *
     * @return mixed
     * @throws GuzzleException
     * @throws RedxException
     */
    public function tracking($trackingId)
    {
        $response = $this->authorization()->send("GET", "v1.0.0-beta/parcel/track/{$trackingId}");
        return $response->tracking;
    }

}
