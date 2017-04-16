<?php
/**
 *
 */
declare(strict_types=1);

namespace DeeZone\URLer;


abstract class DataStore implements DataStructure
{

    //
    protected $schema;

    public function __construct()
    {
        $this->schema();
    }

    /**
     *
     */
    abstract public function saveData(string $userToken, string $URL);

    /**
     *
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