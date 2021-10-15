<?php

namespace webignition\InternetMediaTypeInterface;

/**
 * A parameter value present in an Internet media type.
 *
 * If media type == 'text/html; charset=UTF8', parameter == 'charset=UTF8'
 *
 * Defined as:
 *
 * parameter               = attribute "=" value
 * attribute               = token
 * value                   = token | quoted-string
 *
 * The type, subtype, and parameter attribute names are case-insensitive
 *
 * http://www.w3.org/Protocols/rfc2616/rfc2616-sec3.html#sec3.6
 */
interface ParameterInterface
{
    public const ATTRIBUTE_VALUE_SEPARATOR = '=';

    public function __toString(): string;

    /**
     * Gets the attribute.
     *
     * For a parameter of "charset=UTF-8" the attribute is "charset"
     */
    public function getAttribute(): string;

    /**
     * Gets the value.
     *
     * For a parameter of "charset=UTF-8" the value is "UTF-8"
     */
    public function getValue(): ?string;
}
