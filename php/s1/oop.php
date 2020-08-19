<?php
declare(strict_types=1);
/**
 * PHP Code File
 */

/**
 * Math class
 * 
 * @author Pankaj Choudhary <pankajacks@gmail.com>
 */
class Math {

    const FLAG_EMPTY = 101;
    public $a = 10;
    public $b = 10;

    /**
     * Constructor function
     *
     * @param integer $a
     * @param integer $b
     */
    public function __construct(int $a = 10, int $b = 10) {
        $this->a = $b;
        $this->b = $b;
    }

    /**
     * Sum function to add $a and $b
     *
     * @return integer
     */
    public function sum(): int {
        echo gettype($this->check(20)), ", ";
        echo self::FLAG_EMPTY, ", ";
        return $this->a + $this->b;
    }

    private function check(int $v): bool {
        return true;
    }


}

$t = new Math();
echo $t->sum();

?>
