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
    public function testSaveUrlUrlException()
    {
        $CRuD = new \DeeZone\URLer\CRuD();

        $data = [
            'userToken' => 'lhgl8766b=jhjhg',
            'URL' => '',
        ];
        $CRuD->saveUrl($data);
    }

    /**
     * @dataProvider getData
     * @param $data array
     */
    public function testSaveUrl($data)
    {
        $stub = $this->createMock(\DeeZone\URLer\CRuD::class);
        $stub->method('saveUrl')
            ->willReturn(true);

        $this->assertEquals(true, $stub->saveUrl($data));
    }

    /**
     * Should throw Exception if userToken parameter is empty.
     *
     * @expectedException \Exception
     */
    public function testGetUrlsException()
    {
        $CRuD = new \DeeZone\URLer\CRuD();

        $userToken = '';
        $CRuD->getUrls($userToken);
    }

    /**
     * Should throw Exception if userToken parameter is empty.
     *
     * @expectedException \Exception
     */
    public function testRemoveUrlUserTokenException()
    {
        $CRuD = new \DeeZone\URLer\CRuD();

        $userToken = '';
        $URL = 'http://thesite.com';
        $CRuD->removeUrl($userToken, $URL);
    }

    /**
     * Should throw Exception if userToken parameter is empty.
     *
     * @expectedException \Exception
     */
    public function testRemoveUrlUrlException()
    {
        $CRuD = new \DeeZone\URLer\CRuD();

        $userToken = 'lhgl8766b=jhjhg';
        $URL = '';
        $CRuD->removeUrl($userToken, $URL);
    }

    /**
     * @dataProvider getData
     * @param $data array
     */
    public function testExtractDomain($data)
    {
        $cRuD = new \DeeZone\URLer\CRuD();
        $domain = $cRuD->extractDomain($data['URL']);

        $this->assertEquals('thesite.com', $domain);
    }

    /**
     * @return array
     */
    public function getData()
    {
        return [[
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
        ]];
    }



}
