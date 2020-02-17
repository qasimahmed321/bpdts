<?php

/* Curl class to allow api to make curl calls */

class curl extends core
{
    private $headers = [];
    private $parameters = [];


    /**
     * @param array $headers
     */
    protected function set_headers($headers)
    {
        $this->headers = $headers;
    }


    /**
     * @param array $parameters
     */
    protected function set_parameters($parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * @param string $url in [str url]
     * @param string $output CURL result output type [str output]
     * @return string/obj Result of curl
     */
    protected function curl_get($url, $output = "JSON")
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);

        if($result){
            if($output == "JSON"){
                $result = json_decode($result, true);
            }
        }
        return $result;
    }


}
