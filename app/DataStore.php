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

    abstract public function saveData(array $data);

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