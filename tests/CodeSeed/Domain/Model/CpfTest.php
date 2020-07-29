<?php

namespace Tests\CodeSeed\Domain\Model;

use CodeSeed\Domain\Model\Cpf;
use PHPUnit\Framework\TestCase;

class CpfTest extends TestCase
{
    public function testValidCpf()
    {
        $cpf = new Cpf('79999338801');

        $this->assertEquals('799.993.388-01', $cpf->formatted());
        $this->assertEquals('79999338801', $cpf->number());
    }

    public function testInvalidCpf()
    {
        $this->expectException(\UnexpectedValueException::class);

        new Cpf('11.111.111/0001-33');
    }
}
