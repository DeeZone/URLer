<?php
/**
 * MemoryDataStore class test coverage.
 */
declare(strict_types=1);

namespace Base;

use PHPUnit\Framework\TestCase;

/**
 * Class MemoryDataStoreTest
 * @package Base
 */
class MemoryDataStoreTest extends TestCase
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
     * Should throw Exception if userToken type does not match value defined in Schema.
     *
     * @expectedException \Exception
     */
    public function testSaveDataUserTokenException()
    {
        $memoryDataStore = new \DeeZone\URLer\MemoryDataStore();

        $data = [
            'userToken' => 1234567890,
            'URL' => 'http://thesite.com',
        ];
        $memoryDataStore->saveData($data);
    }

    /**
     * Should throw Exception if URL type does not match value defined in Schema.
     *
     * @expectedException \Exception
     */
    public function testSaveDataURLException()
    {
        $memoryDataStore = new \DeeZone\URLer\MemoryDataStore();

        $data = [
            'userToken' => 'lhgl8766b=jhjhg',
            'URL' => 1234567890,
        ];
        $memoryDataStore->saveData($data);
    }

    /**
     * @dataProvider getData
     * @param $data
     */
    public function testSaveData($data)
    {
        $memoryDataStore = new \DeeZone\URLer\MemoryDataStore();

        $result = $memoryDataStore->saveData($data);
        $this->assertEquals(true, $result);

        // Test for false response to attempt to write over existing data
        $result = $memoryDataStore->saveData($data);
        $this->assertEquals(false, $result);
    }

    /**
     * @return array
     */
    public function getData()
    {
        return [[
            ['userToken' => 'lhgl8766b=jhjhg',
             'URL' => 'http://thesite.com']
        ]];
    }

    /**
     * @dataProvider getData
     * @param $data
     */
    public function testRemoveUrl($data)
    {
        $memoryDataStore = new \DeeZone\URLer\MemoryDataStore();

        $memoryDataStore->saveData($data);
        $result = $memoryDataStore->removeUrl($data['userToken'], $data['URL']);
        $this->assertEquals(true, $result);

        // Attempt to remove URL again, should return false
        $result = $memoryDataStore->removeUrl($data['userToken'], $data['URL']);
        $this->assertEquals(false, $result);
    }

    /**
     *
     */
    protected function tearDown()
    {
        $this->prophet->checkPredictions();
    }
}
