<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Aws\Tests\Swf;

use Aws\Swf\SwfClient;

class SwfClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\Swf\SwfClient::factory
     */
    public function testFactoryInitializesClient()
    {
        $client = SwfClient::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-west-2'
        ));

        $this->assertInstanceOf('Aws\Common\Signature\SignatureV3', $this->readAttribute($client, 'signature'));
        $this->assertInstanceOf('Aws\Common\Credentials\Credentials', $client->getCredentials());
        $this->assertEquals('https://swf.us-west-2.amazonaws.com', $client->getBaseUrl());
    }
}
