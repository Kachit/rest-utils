<?php
/**
 * Class Paginator
 *
 * @package Kachit\Rest
 * @author Kachit
 */
namespace Kachit\Rest\Meta;

class Paginator implements ItemInterface
{
    /**
     * @var int
     */
    protected $total;

    /**
     * @var int
     */
    protected $count;

    /**
     * Paginator constructor.
     * @param int $total
     * @param int $count
     */
    public function __construct(int $total = 0, int $count = 0)
    {
        $this->total = $total;
        $this->count = $count;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'paginator';
    }

    /**
     * @param int $total
     * @return Paginator
     */
    public function setTotal(int $total): Paginator
    {
        $this->total = $total;
        return $this;
    }

    /**
     * @param int $count
     * @return Paginator
     */
    public function setCount(int $count): Paginator
    {
        $this->count = $count;
        return $this;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
