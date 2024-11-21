<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://nampil.dev
 * @since      1.0.0
 *
 * @package    N_Fun_Search
 * @subpackage N_Fun_Search/public
 */


class CharacterFetcher {
    public function fetchCharacterData($apiBaseUrl, $name = null) {
        $curl = curl_init();

        $url = $apiBaseUrl . ($name ? "?name=$name" : "");

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ]);

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            $error = curl_error($curl);
            curl_close($curl);
            throw new Exception("cURL error: $error");
        }

        curl_close($curl);

        return $response;
    }
}
?>