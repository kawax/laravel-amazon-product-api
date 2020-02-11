# UPGRADING

## v4.0
- Many breaking changes.
- Update to PA-API v5
- Use official SDK
- Support Laravel5.8 and PHP7.1 again

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

### .env
```
AMAZON_HOST=webservices.amazon.com
AMAZON_REGION=us-east-1
```

### browse()
`NewReleases` is Deprecated.

`TopSellers` is not support yet.

### New variations(string $asin, int $page = 1)
https://webservices.amazon.com/paapi5/documentation/get-variations.html

### Response format changed
Check your code.
