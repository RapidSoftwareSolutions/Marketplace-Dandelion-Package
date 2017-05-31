<?php
$app->post('/api/Dandelion/extractEntity', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['accessToken', 'sourceType', 'source']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API
    $query_str = $settings['api_url'] . "datatxt/nex/v1";
    $body = array();
    $body[$post_data['args']['sourceType']] = $post_data['args']['source'];
    $body['token'] = $post_data['args']['accessToken'];
    if (isset($post_data['args']['lang']) && strlen($post_data['args']['lang']) > 0) {
        $body['lang'] = $post_data['args']['lang'];
    }
    if (isset($post_data['args']['minConfidence']) && strlen($post_data['args']['minConfidence']) > 0) {
        $body['min_confidence'] = $post_data['args']['minConfidence'];
    }
    if (isset($post_data['args']['minLength']) && strlen($post_data['args']['minLength']) > 0) {
        $body['min_length'] = $post_data['args']['minLength'];
    }
    if (isset($post_data['args']['socialHashtag']) && strlen($post_data['args']['socialHashtag']) > 0) {
        $body['social.hashtag'] = $post_data['args']['socialHashtag'];
    }
    if (isset($post_data['args']['extraTypes']) && strlen($post_data['args']['extraTypes']) > 0) {
        $body['extra_types'] = $post_data['args']['extraTypes'];
    }
    $body['include'] = is_array($post_data['args']['include']) ? implode(',', $post_data['args']['include']) : $post_data['args']['include'];
    if (isset($post_data['args']['country']) && strlen($post_data['args']['country']) > 0) {
        $body['country'] = $post_data['args']['country'];
    }
    if (isset($post_data['args']['customSpots']) && strlen($post_data['args']['customSpots']) > 0) {
        $body['custom_spots'] = $post_data['args']['customSpots'];
    }
    if (isset($post_data['args']['epsilon']) && strlen($post_data['args']['epsilon']) > 0) {
        $body['custom_spots'] = $post_data['args']['epsilon'];
    }
    $body['epsilon'] = $post_data['args']['epsilon'];
    //requesting remote API
    $client = new GuzzleHttp\Client();

    try {

        $resp = $client->request('GET', $query_str, [
            'query' => $body
        ]);

        $responseBody = $resp->getBody()->getContents();
        $rawBody = json_decode($resp->getBody());
        $errorSet = $rawBody->success;

        $all_data[] = $rawBody;
        if ($response->getStatusCode() == '200' && $errorSet === null) {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($all_data) ? $all_data : json_decode($all_data);
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {
        $responseBody = $exception->getResponse()->getReasonPhrase();
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $responseBody;

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    } catch (GuzzleHttp\Exception\BadResponseException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    }


    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});