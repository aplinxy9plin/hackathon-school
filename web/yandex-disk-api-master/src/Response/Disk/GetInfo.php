<?php
declare(strict_types=1);

namespace YandexDiskApi\Response\Disk;

class GetInfo
{
    /**
     * @var string
     */
    private $sha256;

    /**
     * @var string
     */
    private $md5;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $size;

    /**
     * @var string
     */
    private $name;

    public function __construct(string $raw)
    {
        $data = json_decode($raw);

        $this->sha256 = $data->sha256;
        $this->md5 = $data->md5;
        $this->type = $data->type;
        $this->size = $data->size;
        $this->name = $data->name;
    }

    /**
     * @return string
     */
    public function getSha256(): string
    {
        return $this->sha256;
    }

    /**
     * @return string
     */
    public function getMd5(): string
    {
        return $this->md5;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getSize(): string
    {
        return $this->size;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
