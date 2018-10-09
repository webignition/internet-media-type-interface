<?php

namespace webignition\InternetMediaTypeInterface;

/**
 * A parameter value present in an Internet media type
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
 *
 */
interface ParameterInterface
{
    const ATTRIBUTE_VALUE_SEPARATOR = '=';

    /**
     * Sets the attribute (name) of the parameter.
     *
     * For a parameter of "charset=UTF-8" the attribute is "charset"
     *
     * @param string $attribute
     */
    public function setAttribute(string $attribute);

    /**
     * Gets the attribute.
     *
     * @return string
     */
    public function getAttribute(): string;

    /**
     * Sets the value of the parameter.
     *
     * For a parameter of "charset=UTF-8" the value is "UTF-8"
     *
     * @param string $value
     */
    public function setValue(?string $value);

    /**
     * Gets the value.
     *
     * @return string
     */
    public function getValue(): ?string;

    public function __toString(): string;
}
