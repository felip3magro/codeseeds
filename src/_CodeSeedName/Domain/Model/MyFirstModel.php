<?php declare (strict_types = 1);

namespace _CodeSeedName\Domain\Model;

class MyFirstModel
{
    /**
     * @var string
     */
    private $startPoint;

    public function __construct(string $startPoint)
    {
        $this->setStartPoint($startPoint);
    }

    /**
     * Get the value of startPoint
     *
     * @return  string
     */
    public function getStartPoint(): string
    {
        return $this->startPoint;
    }

    /**
     * Set the value of startPoint
     *
     * @param  string  $startPoint
     *
     * @return  self
     */
    protected function setStartPoint(string $startPoint)
    {
        $this->startPoint = $startPoint;

        return $this;
    }
}
