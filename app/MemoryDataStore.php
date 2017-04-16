<?php
/**
 *
 */
declare(strict_types=1);

namespace DeeZone\URLer;

use DeeZone\URLer\DataStructure;

/**
 * Class MemoryDataStructure
 * @package DeeZone\URLer
 */
class MemoryDataStore extends DataStore
{
    /**
     * @param string $userToken
     * @param string $URL
     */
    public function saveData(string $userToken, string $URL)
    {
        // @TODO: Implement saveData() method.
        return true;
    }

    /**
     * Check to see if data already exists in data store.
     *
     * @param
     */
    private function isNewData($userToken, $URL)
    {

    }

}