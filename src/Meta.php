<?php
/**
 * Class Meta
 *
 * @package Kachit\Rest
 * @author Kachit
 */
namespace Kachit\Rest;

use Kachit\Rest\Meta\ItemInterface;

class Meta implements \JsonSerializable
{
    /**
     * @var ItemInterface[]
     */
    private $stack = [];

    /**
     * @param ItemInterface $item
     * @return $this
     */
    public function add(ItemInterface $item)
    {
        $this->stack[$item->getName()]  = $item;
        return $this;
    }

    /**
     * @param string $name
     * @return ItemInterface
     */
    public function get(string $name): ItemInterface
    {
        return $this->stack[$name];
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
        $result = null;
        foreach ($this->stack as $key => $item) {
            $result[$key] = $item;
        }
        return $result;
    }
}