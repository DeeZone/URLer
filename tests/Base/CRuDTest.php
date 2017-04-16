<?php
/**
 * CRuD class test coverage.
 */
declare(strict_types=1);

namespace Base;

use PHPUnit\Framework\TestCase;

/**
 * Class CRuDTest
 * @package Base
 */
class CRuDTest extends TestCase
{
    /**
     * Should throw Exception if userToken parameter is empty.
     *
     * @expectedException \Exception
     */
    public function testSaveUrlUserTokenException()
    {
        $CRuD = new \DeeZone\URLer\CRuD();

        $data = [
            'userToken' => '',
            'URL' => 'http://thesite.com',
        ];
        $CRuD->saveUrl($data);
    }

    /**
     * Should throw Exception if URL parameter is empty.
     *
     * @expectedException \Exception
     */
    public function testSaveUrlURLException()
    {
        $CRuD = new \DeeZone\URLer\CRuD();

        $data = [
            'userToken' => 'lhgl8766b=jhjhg',
            'URL' => '',
        ];
        $CRuD->saveUrl($data);
    }
}
