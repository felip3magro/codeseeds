<?php declare (strict_types = 1);

namespace CodeSeed\Domain\Model;

class Cpf implements DocumentInterface
{
    /**
     * @var string
     */
    protected $number;

    /**
     * @param string $cnpjNumber
     */
    public function __construct(string $cnpjNumber)
    {
        $this->setNumber($cnpjNumber);
    }

    /**
     * Get the value of number
     *
     * @return  string
     */
    public function number(): string
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function formatted(): string
    {
        return sprintf('%s.%s.%s-%s',
            substr($this->number(), 0, 3),
            substr($this->number(), 3, 3),
            substr($this->number(), 6, 3),
            substr($this->number(), 9, 2)
        );
    }

    /**
     * Set the value of number
     *
     * @param  string  $number
     *
     * @return  self
     */
    protected function setNumber(string $number)
    {
        if (!$this->validate($number)) {
            throw new \UnexpectedValueException("CPF is not valid.");
        }

        $this->number = preg_replace('/\D/', '', $number);

        return $this;
    }

    /**
     * Check if is a valid CPF number
     * @param string $number
     *
     * @return string
     */
    public function validate(string $number): bool
    {
        // Extrai somente os números
        $cpf = preg_replace('/\D/', '', $number);

        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }
        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }

        return true;
    }
}
