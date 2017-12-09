<?php
/**
 * Class Factory
 *
 * @package Kachit\Rest
 * @author Kachit
 */
namespace Kachit\Rest;

use Kachit\Rest\Meta\Paginator;
use Throwable;
use Teapot\StatusCode;

class Factory
{
    /**
     * @param mixed $data
     * @return Result
     */
    public function createResult($data = []): Result
    {
        return (new Result())->setData($data);
    }

    /**
     * @param array $data
     * @param int $total
     * @return Result
     */
    public function createResultWithPagination(array $data, int $total): Result
    {
        $result = $this->createResult($data);
        $result
            ->getMeta()
            ->add($this->createPaginator(count($data), $total))
        ;
        return $result;
    }

    /**
     * @param int $total
     * @param int $count
     * @return Paginator
     */
    protected function createPaginator(int $total = 0, int $count = 0)
    {
        return new Paginator($total, $count);
    }

    /**
     * @param int $code
     * @param string $message
     * @return Error
     */
    public function createError(int $code, string $message): Error
    {
        return new Error($code, $message);
    }

    /**
     * @param Throwable $exception
     * @return Error
     */
    public function createErrorFromException(Throwable $exception): Error
    {
        $error = $this->createError($exception->getCode(), $exception->getMessage());
        return $error;
    }

    /**
     * @param array $validation
     * @return Error[]
     */
    public function createErrorsFromValidation(array $validation): array
    {
        $errors = [];
        foreach ($validation as $key => $value) {
            $errors[] = new Error(StatusCode::BAD_REQUEST, $value);
        }
        return $errors;
    }
}
