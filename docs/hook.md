# Hookable

Customize Request.

## AppServiceProvider.php
```php

//...

    public function boot()
    {
        \AmazonProduct::hook('item', function ($request) {
               $resources = [];
               $request->setResources($resources);
               $request->setMerchant('Amazon');

               return $request;
        });
    }
```

## Available hooks
- search
- browse
- item
- items
- variations
