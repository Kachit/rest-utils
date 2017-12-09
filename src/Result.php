<?php
/**
 * Class Result
 *
 * @package Kachit\Rest
 * @author Kachit
 */
namespace Kachit\Rest;

class Result implements \JsonSerializable
{
    /**
     * @var bool
     */
    private $result = true;

    /**
     * @var mixed
     */
    private $data = null;

    /**
     * @var Error[]
     */
    private $errors;

    /**
     * @var mixed
     */
    private $meta = null;

    /**
     * Result constructor.
     */
    public function __construct()
    {
        $this->meta = new Meta();
    }

    /**
     * @return Result
     */
    public function success(): Result
    {
        return $this->setResult(true);
    }

    /**
     * @return Result
     */
    public function fail(): Result
    {
        return $this->setResult(false)->setData(null);
    }

    /**
     * @return bool
     */
    public function isResult(): bool
    {
        return $this->result;
    }

    /**
     * @param bool $result
     * @return Result
     */
    public function setResult(bool $result): Result
    {
        $this->result = $result;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     * @return Result
     */
    public function setData($data): Result
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return Error[]
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @param Error[] $errors
     * @return Result
     */
    public function setErrors(array $errors): Result
    {
        $this->errors = $errors;
        return $this;
    }

    /**
     * @param Error $error
     * @return Result
     */
    public function addError(Error $error): Result
    {
        $this->errors[] = $error;
        return $this;
    }

    /**
     * @return Meta
     */
    public function getMeta(): Meta
    {
        return $this->meta;
    }

    /**
     * @param Meta $meta
     * @return Result
     */
    public function setMeta(Meta $meta): Result
    {
        $this->meta = $meta;
        return $this;
    }

    /**
     * Return object as array
     *
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this);
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
        return $this->toArray();
    }
}
