<?php declare (strict_types = 1);

namespace CodeSeed\Domain\Model;

use CodeSeed\Helpers\StringHelper;

class Address
{
    /**
     * @var string
     */
    public $street;

    /**
     * @var string
     */
    public $number;

    /**
     * @var string
     */
    public $district;

    /**
     * @var string
     */
    public $complement;

    /**
     * @var string
     */
    public $city;

    /**
     * @var string
     */
    public $state;

    /**
     * @var string
     */
    public $country;

    /**
     * @var string
     */
    public $zipCode;

    /**
     * @var StringHelper
     */
    private $stringHelper;

    public function __construct()
    {
        $this->stringHelper = new StringHelper;
    }

    /**
     * Get the value of street
     * @param int $size
     * @return  string
     */
    public function street(int $size = 255): string
    {
        return $this->stringHelper->maxSize((string) $this->street, $size);
    }

    /**
     * Set the value of street
     *
     * @param  string  $street
     *
     * @return  self
     */
    public function setStreet(string $street)
    {
        $this->street = $this->stringHelper->sanitize($street);

        return $this;
    }

    /**
     * Get the value of number
     * @param int $size
     *
     * @return  string
     */
    public function number(int $size = 255): string
    {
        return $this->stringHelper->maxSize((string) $this->number, $size);
    }

    /**
     * Set the value of number
     *
     * @param  string  $number
     *
     * @return  self
     */
    public function setNumber(string $number)
    {
        $this->number = $this->stringHelper->sanitize($number);

        return $this;
    }

    /**
     * Get the value of district
     * @param int $size
     *
     * @return  string
     */
    public function district(int $size = 255): string
    {
        return $this->stringHelper->maxSize((string) $this->district, $size);
    }

    /**
     * Set the value of district
     *
     * @param  string  $district
     *
     * @return  self
     */
    public function setDistrict(string $district)
    {
        $this->district = $this->stringHelper->sanitize($district);

        return $this;
    }

    /**
     * Get the value of complement
     * @param int $size
     *
     * @return  string
     */
    public function complement(int $size = 255): string
    {
        return $this->stringHelper->maxSize((string) $this->complement, $size);
    }

    /**
     * Set the value of complement
     *
     * @param  string  $complement
     *
     * @return  self
     */
    public function setComplement(string $complement)
    {
        $this->complement = $this->stringHelper->sanitize($complement);

        return $this;
    }

    /**
     * Get the value of city
     * @param int $size
     * @return  string
     */
    public function city(int $size = 255): string
    {
        return $this->stringHelper->maxSize((string) $this->city, $size);
    }

    /**
     * Set the value of city
     *
     * @param  string  $city
     *
     * @return  self
     */
    public function setCity(string $city)
    {
        $this->city = $this->stringHelper->sanitize($city);

        return $this;
    }

    /**
     * Get the value of state
     *
     * @return  string
     */
    public function state(): string
    {
        return $this->state;
    }

    /**
     * Set the value of state
     *
     * @param  string  $state
     *
     * @return  self
     */
    public function setState(string $state)
    {
        $this->state = $this->stringHelper->maxSize((string) $state, 2);

        return $this;
    }

    /**
     * Get the value of country
     *
     * @return  string
     */
    public function country(): string
    {
        return $this->country;
    }

    /**
     * Set the value of country
     * ISO 3166-1 alpha-3
     * @param  string  $country
     *
     * @return  self
     */
    public function setCountry(string $country)
    {
        $this->country = $this->stringHelper->maxSize((string) $country, 3);

        return $this;
    }

    /**
     * Get the value of zipCode
     *
     * @return  string
     */
    public function zipCode(): string
    {
        return $this->zipCode;
    }

    /**
     * Set the value of zipCode
     *
     * @param  string  $zipCode
     *
     * @return  self
     */
    public function setZipCode(string $zipCode)
    {
        $this->zipCode = $this->stringHelper->maxSize(
            $this->stringHelper->onlyNumbers($zipCode), 8
        );

        return $this;
    }
}
