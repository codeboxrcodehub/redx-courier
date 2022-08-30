<?php

namespace Codeboxr\RedxCourier\Apis;

use GuzzleHttp\Exception\GuzzleException;
use Codeboxr\RedxCourier\Exceptions\RedxException;

class AreaApi extends BaseApi
{
    /**
     * get city List
     *
     * @return mixed
     * @throws RedxException
     * @throws GuzzleException
     */
    public function list()
    {
        $response = $this->authorization()->send("GET", "v1.0.0-beta/areas");
        return $response;
    }
}
