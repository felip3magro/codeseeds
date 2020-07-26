<?php

use CodeSeed\Domain\Factory\DocumentFactory;
use PHPUnit\Framework\TestCase;

class DocumentFactoryTest extends TestCase
{
    public function testCreateNewCpf()
    {
        $cpf = DocumentFactory::create('79999338801');

        $this->assertEquals('799.993.388-01', $cpf->formatted());
        $this->assertEquals('79999338801', $cpf->number());
    }

    public function testCreateNewCnpj()
    {
        $cnpj = DocumentFactory::create('57.511.136/0001-83');

        $this->assertEquals('57.511.136/0001-83', $cnpj->formatted());
        $this->assertEquals('57511136000183', $cnpj->number());
    }

    public function testCreateInvalidDocument()
    {
        $this->expectException(\UnexpectedValueException::class);

        DocumentFactory::create('123444');
    }
}
