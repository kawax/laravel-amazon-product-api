# Hookable

Customize Operation.

## AppServiceProvider.php
```php
use ApaiIO\Operations\Lookup;

//...

    public function boot()
    {
        \AmazonProduct::hook('item', function (Lookup $lookup) {
               return $lookup->setMerchantId('Amazon');
        });
    }
```

## Available hooks
- search
- browse
- item
- items
- run
