<?php

namespace webignition\InternetMediaTypeInterface;

/**
 * Models an Internet Media Type as defined as:.
 *
 * HTTP uses Internet Media Types [17] in the Content-Type (section 14.17) and
 * Accept (section 14.1) header fields in order to provide open and extensible data
 * typing and type negotiation.
 *
 * media-type     = type "/" subtype *( ";" parameter )
 * type           = token
 * subtype        = token
 *
 * Parameters MAY follow the type/subtype in the form of attribute/value pairs
 *
 * parameter               = attribute "=" value
 * attribute               = token
 * value                   = token | quoted-string
 *
 * The type, subtype, and parameter attribute names are case-insensitive
 *
 * http://www.w3.org/Protocols/rfc2616/rfc2616-sec3.html#sec3.7
 *
 * Note: may have multiple parameters as per Content-Type example
 * in http://www.w3.org/Protocols/rfc1341/rfc1341.html section 7.3.2:
 *
 *       Content-Type: Message/Partial;
 *           number=2; total=3;
 *           id="oc=jpbe0M2Yt4s@thumper.bellcore.com";
 */
interface InternetMediaTypeInterface
{
    public const TYPE_SUBTYPE_SEPARATOR = '/';
    public const PARAMETER_ATTRIBUTE_VALUE_SEPARATOR = '=';
    public const ATTRIBUTE_PARAMETER_SEPARATOR = ';';

    public function __toString(): string;

    /**
     * For a media type of "text/html", the type is "text".
     */
    public function setType(string $type): void;

    /**
     * Gets the type.
     */
    public function getType(): ?string;

    /**
     * For a media type of "text/html", the subtype is "html".
     */
    public function setSubtype(string $subtype): void;

    public function getSubtype(): ?string;

    /**
     * Adds a parameter.
     */
    public function addParameter(ParameterInterface $parameter): void;

    /**
     * Checks if this instance has a parameter matching the given attribute.
     */
    public function hasParameter(string $attribute): bool;

    /**
     * Removes a parameter previously set.
     */
    public function removeParameter(ParameterInterface $parameter): void;

    /**
     * Gets a parameter matching the given attribute.
     *
     * A value of null MUST be returned if the parameter is not present.
     */
    public function getParameter(string $attribute): ?ParameterInterface;

    /**
     * Gets an interable collection of parameters.
     *
     * @return ParameterInterface[]
     */
    public function getParameters(): array;

    /**
     * Returns a string representation of the type and subtype in the form "{type}/{subtype}".
     */
    public function getTypeSubtypeString(): string;
}
