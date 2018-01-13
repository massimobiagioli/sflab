<?php

namespace App\Tests\Module\Dummy;

use PHPUnit\Framework\TestCase;
use App\Module\Dummy\DummyDefaultImpl;

class DummyDefaultImplTest extends TestCase {
    
    public function testExecute()
    {
        $obj = new DummyDefaultImpl();
        $result = $obj->execute();
        $this->assertEquals('Executed from Default Dummy Implementation', $result);
    }

}