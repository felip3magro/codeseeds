<?php declare (strict_types = 1);

namespace CodeSeed\Domain\Model;

interface DocumentInterface
{
    public function number(): string;
    public function formatted(): string;
}
