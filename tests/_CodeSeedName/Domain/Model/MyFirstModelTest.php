<?php

use PHPUnit\Framework\TestCase;
use _CodeSeedName\Domain\Model\MyFirstModel;

class MyFirstModelTest extends TestCase
{
    public function testInitializeMyFirstModel()
    {
        $myFirstModel = new MyFirstModel('Bring me coffe!');

        $this->assertEquals('Bring me coffe!', $myFirstModel->getStartPoint());
    }
}
