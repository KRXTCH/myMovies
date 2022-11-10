<?php

class Request
{

    function CallAPI($method, $url, $data = false, $query = false)
    {
        $curl = curl_init();
        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);

                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_PUT, 1);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }
        if ($query) {
            curl_setopt($curl, CURLOPT_URL, $_ENV['TMDB_URL'] . $url . '?api_key=' . $_ENV['TMDB_KEY'] . '&query=' . $query . '&language=fr-FR');
        } else {
            curl_setopt($curl, CURLOPT_URL, $_ENV['TMDB_URL'] . $url . '?api_key=' . $_ENV['TMDB_KEY'] . '&language=fr-FR');
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_VERBOSE, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
        ));

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
    }
}
