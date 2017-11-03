<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use YandexDiskApi\Disk;
use YandexDiskApi\Exception\Disk;

/**
 * @covers Disk
 */
final class DiskTest extends TestCase
{
    private const TARGET_PATH_1 = '/lola.png';

    /**
     * @var string
     */
    private $token;

    protected function setUp()
    {
        $this->token = getenv('YANDEX_DISK_TOCKEN');
        if (empty($this->token)) {
            echo 'Tocken dont set. Use YANDEX_DISK_TOCKEN={tocken} ./vendor/bin/phpunit for run', PHP_EOL;
            exit(2);
        }
    }

    public function testWrongToken(): void
    {
        $this->expectException(Disk::class);

        $disk = new Disk('wrong-token');
        $disk->upload('./assets/lola-edu.png', self::TARGET_PATH_1);
    }

    public function testFileNotFound(): void
    {
        $this->expectException(Disk::class);

        $disk = new Disk($this->token);
        $disk->upload('blabla', self::TARGET_PATH_1);
    }

    public function testUploadOk(): void
    {
        $disk = new Disk($this->token);
        $disk->upload('./assets/lola-edu.png', self::TARGET_PATH_1);
    }
}
