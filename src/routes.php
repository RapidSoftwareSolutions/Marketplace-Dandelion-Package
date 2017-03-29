       <?php
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
        'extractEntity',
        'metadata'
       ];
       foreach ($routes as $file) {
           require __DIR__ . '/../src/routes/' . $file . '.php';
       }

