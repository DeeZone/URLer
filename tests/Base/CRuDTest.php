<?php
/**
 *
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
     * @var \Prophecy\Prophet
     */
    private $prophet;

    /**
     *
     */
    protected function setup()
    {
        $this->prophet = new \Prophecy\Prophet;
    }

    /**
     * @dataProvider getUrls
     * @param $substitutions
     * @param $text
     * @param $encoded
     */
    public function testSaveUrlTrue($userToken, $URL)
    {
        $CRuD = new \DeeZone\URLer\CRuD();

        $result = $CRuD->saveUrl($userToken, $URL);
        $this->assertEquals(true, $result);
    }

    /**
     * Should throw Exception if userToken parameter is empty.
     *
     * @expectedException \Exception
     */
    public function testSaveUrlUserTokenException()
    {
        $CRuD = new \DeeZone\URLer\CRuD();

        $userToken = '';
        $URL = 'http://thesite.com';
        $CRuD->saveUrl($userToken, $URL);
    }

    /**
     * Should throw Exception if URL parameter is empty.
     *
     * @expectedException \Exception
     */
    public function testSaveUrlURLException()
    {
        $CRuD = new \DeeZone\URLer\CRuD();

        $userToken = 'lhgl8766b=jhjhg';
        $URL = '';
        $CRuD->saveUrl($userToken, $URL);
    }

    /**
     * @return array
     */
    public function getUrls()
    {
        return array(
            array('lhgl8766b=jhjhg', 'http://thesite.com')
        );
    }

    /**
     *
     */
    protected function tearDown()
    {
        $this->prophet->checkPredictions();
    }
}
