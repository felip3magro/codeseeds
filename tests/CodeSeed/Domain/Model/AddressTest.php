<?php

namespace Tests\CodeSeed\Domain\Model;

use CodeSeed\Domain\Model\Address;
use PHPUnit\Framework\TestCase;

class AddressTest extends TestCase
{
    /**
     * @var array
     */
    private $address = [
        'street'     => 'Avenida Washington Luiz',
        'number'     => '1000',
        'district'   => 'Centro',
        'complement' => 'Apto 301',
        'city'       => 'São Paulo',
        'state'      => 'SP',
        'country'    => 'BRA',
        'zipCode'    => '01156-060',
    ];

    public function testNewAddress()
    {
        $address = new Address;
        $address
            ->setStreet($this->address['street'])
            ->setNumber($this->address['number'])
            ->setDistrict($this->address['district'])
            ->setComplement($this->address['complement'])
            ->setCity($this->address['city'])
            ->setState($this->address['state'])
            ->setCountry($this->address['country'])
            ->setZipCode($this->address['zipCode']);

        $this->assertEquals('Avenida Washington', $address->street(18));
        $this->assertEquals($this->address['number'], $address->number());
        $this->assertEquals($this->address['district'], $address->district());
        $this->assertEquals($this->address['complement'], $address->complement());
        $this->assertEquals('Sao Paulo', $address->city());
        $this->assertEquals($this->address['state'], $address->state());
        $this->assertEquals($this->address['country'], $address->country());
        $this->assertEquals('01156060', $address->zipCode());
    }

    public function testNewEmptyAddress()
    {
        $address = new Address;

        $this->assertEquals('', $address->street());
        $this->assertEquals('', $address->number());
        $this->assertEquals('', $address->district());
        $this->assertEquals('', $address->complement());
        $this->assertEquals('', $address->city());
        $this->assertEquals('', $address->state());
        $this->assertEquals('', $address->country());
        $this->assertEquals('', $address->zipCode());
    }
}
