<?php
/**
 * Connection class
 * @author Tobias Ludewig <mail@tobias-ludewig.de>
 */
 class Connection
{
    /**
     * URI to api
     * @var string
     */
    protected $apiURL;

    /**
     * Default constructor
     * @param $api string
     */
    public function __construct($api)
    {
        $this->apiURL = $api;
    }

    /**
     * Executes a request to the API
     * @param $postParams string
     * @return mixed
     */
    public function request($postParams)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->apiURL);
        curl_setopt ($curl, CURLOPT_POST, 1);
        curl_setopt ($curl, CURLOPT_POSTFIELDS, $postParams);
        curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
        return curl_exec($curl);
    }
}
