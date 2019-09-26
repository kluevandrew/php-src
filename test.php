<?php

class Fraction
{
    private $num;
    private $den;

    public function __construct(int $num, int $den)
    {
        $this->num = $den < 0 ? $num * -1 : $num;
        $this->den = $den < 0 ? $den * -1 : $den; // Should guard against 0 here.
    }

    /**
     * @return bool Whether this fraction is equal to $other.
     */
    public function __equals($other): bool
    {
        if ($other instanceof Fraction) {
            return $this->num * $other->den == $other->num * $this->den;
        }

        return is_numeric($other) && $this->num == $other * $this->den;
    }

    /**
     * @return Natural ordering of this fraction relative to $other.
     */
    public function __compareTo($other): int
    {
        if ($other instanceof Fraction) {
            return $this->num * $other->den <=> $other->num * $this->den;
        }

        if (!is_numeric($other)) {
            throw new DomainException(
                "Natural ordering relative to non-numeric values is not defined");
        }

        return $this->num <=> $other * $this->den;
    }
}

$a = new Fraction(5,  2); // 2.5
$b = new Fraction(10, 4); // 2.5

var_dump($a == $b, $a < $b);