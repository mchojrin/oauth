<?php

http_response_code($response->getStatusCode());
foreach ($response->getHeaders() as $name => $values) {
    header("$name: " . implode(',', $values));
}
echo $response->getBody();