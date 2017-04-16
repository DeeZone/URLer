<?php
/**
 * DataStructure: Interface to provide requirments of necessary methods in DataStore types.
 */
declare(strict_types=1);

namespace DeeZone\URLer;

/**
 * Class DataStructure
 * @package DeeZone\URLer
 */
interface DataStructure
{
    public function schema();
}
