<?php
/**
 * Class ItemInterface
 *
 * @package Kachit\Rest\Meta
 * @author Kachit
 */
namespace Kachit\Rest\Meta;

interface ItemInterface extends \JsonSerializable
{
    /**
     * @return string
     */
    public function getName(): string;
}