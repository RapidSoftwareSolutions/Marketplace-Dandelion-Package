<?php

namespace Test\Functional;

require_once(__DIR__ . '/../../src/Models/checkRequest.php');

class DandelionTest extends BaseTestCase
{

    public function testListMetrics()
    {

        $routes = [
            'deleteModel',
            'classifyText',
            'updateModel',
            'getModels',
            'getSingleModel',
            'createModel',
            'searchWikipages',
            'identifyTextSentiments',
            'detectLanguages',
            'getTextSimilarity',
            'extractEntity'

        ];

        foreach ($routes as $file) {
            $var = '{  
                    }';
            $post_data = json_decode($var, true);

            $response = $this->runApp('POST', '/api/Dandelion/' . $file, $post_data);

            $this->assertEquals(200, $response->getStatusCode(), 'Error in ' . $file . ' method');
        }
    }

}
