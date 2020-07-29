<?php

namespace Tests\CodeSeed\Domain\Model;

use CodeSeed\Domain\Model\Cnpj;
use PHPUnit\Framework\TestCase;

class CnpjTest extends TestCase
{
    public function testValidCnpj()
    {
        $cnpj = new Cnpj('57.511.136/0001-83');

        $this->assertEquals('57.511.136/0001-83', $cnpj->formatted());
        $this->assertEquals('57511136000183', $cnpj->number());
    }

    public function testInvalidCnpj()
    {
        $this->expectException(\UnexpectedValueException::class);

        new Cnpj('11.111.111/0001-33');
    }
}
