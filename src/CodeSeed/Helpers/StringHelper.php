<?php declare (strict_types = 1);

namespace CodeSeed\Helpers;

class StringHelper
{
    /**
     * @param string $string
     * @param int $from
     * @param int|null $to
     *
     * @return string
     */
    public function subStr(string $string, int $from = 0, ?int $to = null): string
    {
        return substr($string, $from, $to);
    }

    /**
     * Cut down string to the maximum size
     *
     * @param string $string
     * @param int $maxSize
     *
     * @return string
     */
    public function maxSize(string $string, int $maxSize): string
    {
        return $this->substr($string, 0, $maxSize);
    }

    /**
     * @param string $string
     *
     * @return string
     */
    public function onlyNumbers(string $string): string
    {
        return preg_replace('/\D/', '', $string);
    }

    /**
     * Remove accents from a string
     *
     * @var string $text
     *
     * @return string
     */
    public static function removeAccents($text): string
    {
        $accentCharList = [
            "á", "à", "â", "ã", "ä", "é", "è", "ê", "ë", "í", "ì", "î", "ï", "ó",
            "ò", "ô", "õ", "ö", "ú", "ù", "û", "ü", "ç", "Á", "À", "Â", "Ã", "Ä",
            "É", "È", "Ê", "Ë", "Í", "Ì", "Î", "Ï", "Ó", "Ò", "Ô", "Õ", "Ö", "Ú",
            "Ù", "Û", "Ü", "Ç",
        ];

        $noAccentCharList = [
            "a", "a", "a", "a", "a", "e", "e", "e", "e", "i", "i", "i", "i", "o",
            "o", "o", "o", "o", "u", "u", "u", "u", "c", "A", "A", "A", "A", "A",
            "E", "E", "E", "E", "I", "I", "I", "I", "O", "O", "O", "O", "O", "U",
            "U", "U", "U", "C",
        ];

        return (string) str_replace($accentCharList, $noAccentCharList, $text);
    }

    /**
     * @param string $string
     *
     * @return string
     */
    public function sanitize(string $string): string
    {
        return $this->removeAccents(trim($string));
    }
}
