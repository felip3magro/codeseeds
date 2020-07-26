<?php declare (strict_types = 1);

namespace CodeSeed\Domain\Factory;

use CodeSeed\Domain\Model\Cnpj;
use CodeSeed\Domain\Model\Cpf;
use CodeSeed\Domain\Model\DocumentInterface;

class DocumentFactory
{
    const CPF_DIGITS = '11';
    const CNPJ_DIGITS = '14';

    /**
     * @param string $documentNumber
     * @return DocumentInterface
     */
    public static function create(string $documentNumber): DocumentInterface
    {
        $documentNumber = preg_replace('/\D/', '', $documentNumber);

        switch (strlen($documentNumber)) {
            case self::CPF_DIGITS:
                return new Cpf($documentNumber);
                break;
            case self::CNPJ_DIGITS:
                return new Cnpj($documentNumber);
            default:
                throw new \UnexpectedValueException('The Document is not a valid Cpf or Cnpj');
                break;
        }
    }
}
