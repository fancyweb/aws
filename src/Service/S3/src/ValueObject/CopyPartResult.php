<?php

namespace AsyncAws\S3\ValueObject;

/**
 * Container for all response elements.
 */
final class CopyPartResult
{
    /**
     * Entity tag of the object.
     */
    private $etag;

    /**
     * Date and time at which the object was uploaded.
     */
    private $lastModified;

    /**
     * @param array{
     *   ETag?: null|string,
     *   LastModified?: null|\DateTimeImmutable,
     * } $input
     */
    public function __construct(array $input)
    {
        $this->etag = $input['ETag'] ?? null;
        $this->lastModified = $input['LastModified'] ?? null;
    }

    public static function create($input): self
    {
        return $input instanceof self ? $input : new self($input);
    }

    public function getEtag(): ?string
    {
        return $this->etag;
    }

    public function getLastModified(): ?\DateTimeImmutable
    {
        return $this->lastModified;
    }
}
