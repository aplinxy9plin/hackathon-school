<?php
declare(strict_types=1);

namespace YandexDiskApi;

use LightweightCurl\Curl;
use LightweightCurl\Request;
use YandexDiskApi\Arguments\Disk\GetInfo as GetInfoArguments;
use YandexDiskApi\Exception\Upload as UploadException;
use YandexDiskApi\Exception\Download as DownloadException;
use YandexDiskApi\Exception\GetInfo as GetInfoException;

use YandexDiskApi\Response\Disk\GetInfo as GetInfoResponse;

class Disk extends Common
{
    /**
     * @param string $serverFile
     * @param string $yandexFile
     *
     * @throws UploadException
     */
    public function upload(string $serverFile, string $yandexFile): void
    {
        if (!is_readable($serverFile)) {
            throw new UploadException('Upload file not found');
        }

        $request = $this->makeRequest('upload?path=' . urlencode($yandexFile) . '&overwrite=true');
        $response = $this->curl->call($request);
        $data = json_decode($response->getData());
        if ($response->getHttpCode() < 200 || 300 <= $response->getHttpCode()) {
            throw new UploadException($data->error);
        }

        $request = new Request();
        $request->setUrl($data->href);
        $request->setMethod(Request::METHOD_PUT);

        $request->setFileForPutRequest($serverFile);
        $request->setHeaders([
            'Etag' => md5_file($serverFile),
            'Sha256' => hash_file('sha256', $serverFile),
        ]);

        $response = $this->curl->call($request);
        if ($response->getHttpCode() !== 201) {
            throw new UploadException('ErrorToUpload');
        }
    }

    /**
     * @param string $yandexFile File on Yandex
     * @param string $serverFile Dist file on own server
     *
     * @throws DownloadException
     */
    public function download(string $yandexFile, string $serverFile): void
    {
        $request = $this->makeRequest('download?path=' . urlencode($yandexFile));
        $response = $this->curl->call($request);

        $data = json_decode($response->getData());
        if ($response->getHttpCode() < 200 || 300 <= $response->getHttpCode()) {
            throw new DownloadException($data->error);
        }

        $request = new Request();
        $request->setUrl($data->href);
        $request->setOutFilename($serverFile);

        $response = $this->curl->call($request);

        if ($response->getHttpCode() !== 200) {
            throw new DownloadException('ErrorToDownload');
        }
    }

    public function getInfo(GetInfoArguments $info): GetInfoResponse
    {

        $query = [
            'path' => $info->getPath(),
        ];

        if ($info->getLimit()) {
            $query['limit'] = $info->getLimit();
        }

        if ($info->getOffset()) {
            $query['offset'] = $info->getOffset();
        }

        if ($info->getSort()) {
            $query['sort'] = $info->getSort();
        }

        $request = $this->makeRequest('?' . http_build_query($query));
        $response = $this->curl->call($request);

        if ($response->getHttpCode() !== 200) {
            throw new GetInfoException($request->getData());
        }

        return new GetInfoResponse($response->getData());
    }
}
