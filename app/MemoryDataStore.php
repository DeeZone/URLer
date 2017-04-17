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
    public function saveData(array $data): bool
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
     * @param $userToken string
     * @return array
     */
    public function getUrls(string $userToken): array
    {
        $URLs = $this->data[$userToken]['URL'];

        return $URLs;
    }

    /**
     *
     */
    public function removeUrl(string $userToken, string $URL): bool
    {
        $data = [
            'userToken' => $userToken,
            'URL' => $URL,
        ];
        if (!$this->isExistingData($data)) {
            return false;
        }

        foreach ($this->data[$userToken]['URL'] as $urlIndex => $userUrl) {
            if ($userUrl == $URL) {
                unset($this->data[$userToken]['URL'][$urlIndex]);
            }
        }

        return true;
    }


    /**
     * Check to see if data already exists in data store.
     *
     * @param array $data
     * @return boolean
     */
    public function isExistingData($data)
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
