<?php
/**
 * Problem #1: CRUD without the U
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
    // The datastore object. Change to support different types of storage.
    private $dataStore;

    /**
     * CRuD constructor. Use memory based data store.
     *
     * From specification description:
     * Because your startup's stack does not contain a database or external in-memory store such as Redis yet, you
     * will **need** to store all data in memory.  Please define the datastructures you use as part of this exercise.
     */
    public function __construct()
    {
        $this->dataStore = new MemoryDataStore();
    }
    /**
     * @param $data array
     * @throws Exception
     * @return boolean
     */
    public function saveUrl(array $data): bool
    {
        if (empty($data['userToken'])) {
            throw new Exception('saveUrl ERROR: Missing required user token value.');
        }
        if (empty($data['URL'])) {
            throw new Exception('saveUrl ERROR: Missing required URL value.');
        }

        $result = $this->dataStore->saveData($data);

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