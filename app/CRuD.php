<?php
/**
 *
 */
declare(strict_types=1);

namespace DeeZone\URLer;

use DeeZone\URLer\DataStructure;
use DeeZone\URLer\MemoryDataStore;
use \Exception;

/**
 *
 */
class CRuD
{
    //
    private $dataStore;

    public function __construct()
    {
        $this->dataStore = new MemoryDataStore();
    }
    /**
     * @param $userToken string
     * @param $URL string
     * @throws Exception
     * @return boolean
     */
    public function saveUrl(string $userToken, string $URL): bool
    {
        if (empty($userToken)) {
            throw new Exception('saveUrl ERROR: Missing required user token value.');
        }
        if (empty($URL)) {
            throw new Exception('saveUrl ERROR: Missing required URL value.');
        }

        $result = $this->dataStore->saveData($userToken, $URL);

        return $result;
    }

    /**
     *
     * @param $userToken string
     * @return array
     */
    public function getUrls(string $userToken): array
    {

    }

    /**
     * @param string $domain
     * @return array
     */
    public function getUsersByDomain(string $domain): array
    {
        $results = [];

        return $results;
    }

    /**
     * @param $userToken string
     * @param $URL string
     * @return boolean
     */
    public function removeUrl(string $userToken, string $URL): bool
    {

    }

    /**
     *
     */
    private function isNotNewUrlByUser(DataStructure $data, string $userToken, string $URL)
    {


    }

    /**
     *
     */
    private function extractDomain()
    {

    }
}