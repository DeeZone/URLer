<?php
/**
 * URLer class test coverage.
 */
declare(strict_types=1);

namespace Base;

use PHPUnit\Framework\TestCase;

/**
 * Class URLerTestTest
 * @package Base
 */
class URLerTest extends TestCase
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
     * @dataProvider getData
     * @param $datas
     */
    public function testGetUsersByDomain($datas)
    {
        $cRuD = new \DeeZone\URLer\CRuD();

        // Load data
        foreach ($datas as $data) {
            $result = $cRuD->saveUrl($data);
            $this->assertEquals(true, $result);
        }

        // Look for domain
        $uRLer = new \DeeZone\URLer\URLer($cRuD->getData());
        $results = $uRLer->getUsersByDomain($cRuD->extractDomain($datas[0]['URL']));

        $this->assertEquals('lhgl8766b=jhjhg', $results[0]);
        $this->assertEquals('ljLHlj986kjh68NN', $results[1]);
        $this->assertEquals('sdf765FG6^&kg', $results[2]);

        $this->assertNotEquals('JHG876gfgjh11', $results[0]);
        $this->assertNotEquals('JHG876gfgjh11', $results[1]);
        $this->assertNotEquals('JHG876gfgjh11', $results[2]);
    }

    /**
     * @return array
     */
    public function getData()
    {
        return [[[
            [
                'userToken' => 'lhgl8766b=jhjhg',
                'URL' => 'http://thesite.com'
            ],
            [
                'userToken' => 'ljLHlj986kjh68NN',
                'URL' => 'http://thesite.com'
            ],
            [
                'userToken' => 'lhgl8766b=jhjhg',
                'URL' => 'http://theothersite.com'
            ],
            [
                'userToken' => 'sdf765FG6^&kg',
                'URL' => 'http://thesite.com'
            ],
            [
                'userToken' => 'sdf765FG6^&kg',
                'URL' => 'http://theothersite.com'
            ],
            [
                'userToken' => 'JHG876gfgjh11',
                'URL' => 'http://theothersite.com'
            ],
        ]]];
    }

    /**
     *
     */
    protected function tearDown()
    {
        $this->prophet->checkPredictions();
    }
}
