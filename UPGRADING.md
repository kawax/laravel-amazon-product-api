# UPGRADING

## 3.0 to 4.0
- Many breaking changes.
- Update to PA-API v5
- Use official SDK

https://webservices.amazon.com/paapi5/documentation/

### config
Add `host` and `region`.
https://webservices.amazon.com/paapi5/documentation/common-request-parameters.html#host-and-region

```
return [
    'api_key'        => env('AMAZON_API_KEY', ''),
    'api_secret_key' => env('AMAZON_API_SECRET_KEY', ''),
    'associate_tag'  => env('AMAZON_ASSOCIATE_TAG', ''),
    'host'           => env('AMAZON_HOST', 'webservices.amazon.co.jp'),
    'region'         => env('AMAZON_REGION', 'us-west-2'),
];
```

## browse() using SearchRequest
Instead of BrowseNode.

Direct return items info.

### Response format changed
Check your code.
