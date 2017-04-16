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
    //
    private $data;

    /**
     * @param array $data
     */
    public function saveData(array $data)
    {
        // Validate that values conform to schema structure
        foreach ($data as $field => $value) {
            if ($this->schema[$field] != gettype($value)) {
                throw new \Exception('saveDate: Value for field does not match type defined in schema: ' . $field);
            }
        }

        // Validate that the data entry does not already exist
        if ($this->isExistingData($data)) {
            return false;
        }

        $this->data[$data['userToken']]['URL'][] = $data['URL'];

        return true;
    }

    /**
     *
     */
    protected function getUrls()
    {

    }

    /**
     *
     */
    protected function removeUrl()
    {

    }


    /**
     * Check to see if data already exists in data store.
     *
     * @param array $data
     * @return boolean
     */
    private function isExistingData($data)
    {
        if (isset($this->data[$data['userToken']]['URL'])) {

            foreach ($this->data[$data['userToken']]['URL'] as $userURL) {
                if ($userURL == $data['URL']) {
                    return true;
                }
            }
        }

        return false;
    }

}