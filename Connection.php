<?php
/**
 * Connection class
 * @author Tobias Ludewig <mail@tobias-ludewig.de>
 * @copyright (C) 2011  Tobias Ludewig

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
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
     * @param $postParams array
     * @return mixed
     */
    public function request($postParams)
    {
        $postVal = array();
        foreach ($postParams as $key => $val)
        {
            $postVal[] = $key . '=' . $val;
        }

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->apiURL);
        curl_setopt ($curl, CURLOPT_POST, 1);
        curl_setopt ($curl, CURLOPT_POSTFIELDS, implode('&', $postVal));
        curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
        return curl_exec($curl);
    }

    /**
     * Generates a seq number
     * @return int
     */
     public function getSeq()
     {
         return rand(0,100);
     }
}
