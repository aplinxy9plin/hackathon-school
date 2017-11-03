<?php
declare(strict_types=1);

namespace YandexDiskApi\Arguments\Disk;

class GetInfo
{
    /**
     * @var string
     */
    private $path;

    /**
     * @var string|null
     */
    private $sort;

    /**
     * @var int|null
     */
    private $limit;

    /**
     * @var int|null
     */
    private $offset;

    /**
     * GetInfo constructor.
     *
     * @param string $path
     */
    public function __construct(string $path)
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path)
    {
        $this->path = $path;
    }

    /**
     * @return null|string
     */
    public function getSort(): ?string
    {
        return $this->sort;
    }

    /**
     * @param null|string $sort
     */
    public function setSort(?string $sort)
    {
        $this->sort = $sort;
    }

    /**
     * @return int|null
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * @param int|null $limit
     */
    public function setLimit(?int$limit)
    {
        $this->limit = $limit;
    }

    /**
     * @return int|null
     */
    public function getOffset(): ?int
    {
        return $this->offset;
    }

    /**
     * @param int|null $offset
     */
    public function setOffset(?int $offset)
    {
        $this->offset = $offset;
    }
}
