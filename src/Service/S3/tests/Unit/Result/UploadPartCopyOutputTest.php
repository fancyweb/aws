<?php

namespace AsyncAws\S3\Tests\Unit\Result;

use AsyncAws\Core\Response;
use AsyncAws\Core\Test\Http\SimpleMockedResponse;
use AsyncAws\Core\Test\TestCase;
use AsyncAws\S3\Result\UploadPartCopyOutput;
use Psr\Log\NullLogger;
use Symfony\Component\HttpClient\MockHttpClient;

class UploadPartCopyOutputTest extends TestCase
{
    public function testUploadPartCopyOutput(): void
    {
        self::fail('Not implemented');

        // see example-1.json from SDK
        $response = new SimpleMockedResponse('<CopyPartResult>
          <ETag>"65d16d19e65a7508a51f043180edcc36"</ETag>
          <LastModified>2016-12-29T21:44:28.000Z</LastModified>
        </CopyPartResult>');

        $client = new MockHttpClient($response);
        $result = new UploadPartCopyOutput(new Response($client->request('POST', 'http://localhost'), $client, new NullLogger()));

        self::assertSame('changeIt', $result->getCopySourceVersionId());
        // self::assertTODO(expected, $result->getCopyPartResult());
        self::assertSame('changeIt', $result->getServerSideEncryption());
        self::assertSame('changeIt', $result->getSSECustomerAlgorithm());
        self::assertSame('changeIt', $result->getSSECustomerKeyMD5());
        self::assertSame('changeIt', $result->getSSEKMSKeyId());
        self::assertFalse($result->getBucketKeyEnabled());
        self::assertSame('changeIt', $result->getRequestCharged());
    }
}
