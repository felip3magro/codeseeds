<?php declare (strict_types = 1);

namespace CodeSeed\Domain\Model;

class Cnpj implements DocumentInterface
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
        return sprintf('%s.%s.%s/%s-%s',
            substr($this->number(), 0, 2),
            substr($this->number(), 2, 3),
            substr($this->number(), 5, 3),
            substr($this->number(), 8, 4),
            substr($this->number(), 12, 2)
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
            throw new \UnexpectedValueException("CNPJ is not valid.");
        }

        $this->number = preg_replace('/\D/', '', $number);

        return $this;
    }

    /**
     * Check if is a valid CNPJ number
     * @param string $number
     *
     * @return string
     */
    public function validate(string $number): bool
    {
        $cnpj = preg_replace('/\D/', '', $number);
        // Valida tamanho
        if (strlen($cnpj) != 14) {
            return false;
        }

        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 11111111111111
        if (preg_match('/(\d)\1{13}/', $cnpj)) {
            return false;
        }

        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto)) {
            return false;
        }

        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;

        return (bool) ($cnpj[13] == ($resto < 2 ? 0 : 11 - $resto));
    }
}
