<?php
/**
 *
 */
declare(strict_types=1);

namespace DeeZone\URLer;

/**
 *
 */
abstract class DataStore implements DataStructure
{
    // Schema field names and types.
    protected $schema;

    public function __construct()
    {
        $this->schema();
    }

    /**
     * @param $data array
     * @return boolean
     *
     * Return a boolean value of whether or not the URL was successfully saved. If the URL has been saved for the user
     * previously, this function should not save it and return false.
     */
    abstract public function saveData(array $data): bool;

    /**
     * @param $userToken string
     * @return boolean
     *
     * Return a boolean value of whether or not the URL was successfully saved. If the URL has been saved for the user
     * previously, this function should not save it and return false.
     */
    abstract public function getUrls(string $userToken): array;

    /**
     * @param $userToken string
     * @param $URL string
     * @return boolean
     *
     * Return a boolean value of whether or not the URL was successfully saved. If the URL has been saved for the user
     * previously, this function should not save it and return false.
     */
    abstract public function removeUrl(string $userToken, string $URL): bool;

    /**
     * Construct schema for reference throughout application.
     */
    public function schema()
    {
        $schema = [
            'userToken' => 'string',
            'URL'       => 'string',
        ];

        $this->schema = $schema;
    }
}