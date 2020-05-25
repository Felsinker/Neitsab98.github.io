<?php
namespace ProjetWeb;

abstract class Enum
{
    protected $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->value;
    }

    /**
     * @return array
     */
    public static function getConstList()
    {
        $rf = new \ReflectionClass(get_called_class());
        return $rf->getConstants();
    }
}
?>
