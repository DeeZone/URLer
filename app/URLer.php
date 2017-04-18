<?php
/**
 *
 */

namespace DeeZone\URLer;

use \Exception;

class URLer
{
    //
    private $data;

    /**
     * URLer constructor.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @param string $domain
     * @return array
     */
    public function getUsersByDomain(string $domain): array
    {
        $users = [];

        foreach ($this->data as $userToken => $URLs) {
            if (in_array($domain, $URLs['URL'])) {
                $users[] = $userToken;
            }
        }

        return $users;
    }

}