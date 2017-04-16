<?php
require_once dirname(__DIR__) . '/URLer/vendor/autoload.php';

use DeeZone\URLer\CRuD;

try {

    $CRuD = new CRuD();

    $userToken = '9876978bhjkhj87668';
    $URL = 'http://test.com';

    $result = $CRuD->saveUrl($userToken, $URL);
    $this->assertEquals(true, $result);

} catch (Throwable $t) {

    echo PHP_EOL, '********', PHP_EOL;
    echo $t->getMessage(), PHP_EOL;
    echo '********', PHP_EOL;

}
