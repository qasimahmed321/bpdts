<?php


/* API class to allow api calls to be made and returned */
class api extends curl
{
    public function get_users_in_london($output = "JSON")
    {
        $this->set_headers(["accept: application/json"]);
        $results = $this->curl_get($this->api_url."city/London/users");
        if(is_array($results)){
            return $this->return_data($results, $output);
        }
        return false;
    }

    public function get_users_around_london($miles, $output = "JSON")
    {
        $data = [];
        $this->set_headers(["accept: application/json"]);
        $results = $this->curl_get($this->api_url."users");
        if(is_array($results)){
            foreach ($results as $user){
                $dist = $this->distance_calc($user['latitude'], $user['longitude'], $this->LONDON_LAT, $this->LONDON_LONG);
                if($dist <= $miles){
                    $data[] = $user;
                }

            }
            return $this->return_data($data, $output);
        }
        return false;
    }


    private function return_data(&$data, $ouput){
        if($ouput == "JSON"){
            return json_encode($data);
        }
        return $data;
    }
}


