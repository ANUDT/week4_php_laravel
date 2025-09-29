<?php

use Illuminate\Support\Str;// Import the Str class to assist with string manipulations.

return [ // Start of the configuration array.

    /*
    |--------------------------------------------------------------------------
    | Default Cache Store
    |--------------------------------------------------------------------------
    |
    | This option controls the default cache store that will be used by the
    | framework. This connection is utilized if another isn't explicitly
    | specified when running a cache operation inside the application.
    |
    */

    'default' => env('CACHE_STORE', 'database'), // The default cache store, which can be set via the CACHE_STORE environment variable, defaulting to 'database' if not set.

    /*
    |--------------------------------------------------------------------------
    | Cache Stores
    |--------------------------------------------------------------------------
    |
    | Here you may define all of the cache "stores" for your application as
    | well as their drivers. You may even define multiple stores for the
    | same cache driver to group types of items stored in your caches.
    |
    | Supported drivers: "array", "database", "file", "memcached",
    |                    "redis", "dynamodb", "octane", "null"
    |
    */

    'stores' => [ // Definition of various cache stores.

        'array' => [/// A simple array-based cache store, useful for testing or temporary caching.
            'driver' => 'array',// The cache driver type.
            'serialize' => false,// Whether to serialize the cached values.
        ],

        'database' => [// A database-backed cache store, which uses a database table to store cached items.
            'driver' => 'database',// The cache driver type.
            'connection' => env('DB_CACHE_CONNECTION'),// The database connection to use, which can be set via the DB_CACHE_CONNECTION environment variable.
            'table' => env('DB_CACHE_TABLE', 'cache'),// The database table to use for caching, defaulting to 'cache' if not set in the environment.
            'lock_connection' => env('DB_CACHE_LOCK_CONNECTION'),// The database connection to use for locks, which can be set via the DB_CACHE_LOCK_CONNECTION environment variable.
            'lock_table' => env('DB_CACHE_LOCK_TABLE'),// The database table to use for locks, which can be set via the DB_CACHE_LOCK_TABLE environment variable.
        ],

        'file' => [// A file-based cache store, which stores cached items in the filesystem.
            'driver' => 'file',// The cache driver type.
            'path' => storage_path('framework/cache/data'),// The filesystem path to use for storing cached items.
            'lock_path' => storage_path('framework/cache/data'),// The filesystem path to use for locking cached items.
        ],

        'memcached' => [// A Memcached-based cache store, which uses the Memcached service for caching.
            'driver' => 'memcached',// The cache driver type.
            'persistent_id' => env('MEMCACHED_PERSISTENT_ID'),// The persistent ID for the Memcached connection, which can be set via the MEMCACHED_PERSISTENT_ID environment variable.
            'sasl' => [// SASL authentication credentials for Memcached, if needed.
                env('MEMCACHED_USERNAME'),// The username for SASL authentication, which can be set via the MEMCACHED_USERNAME environment variable.
                env('MEMCACHED_PASSWORD'),// The password for SASL authentication, which can be set via the MEMCACHED_PASSWORD environment variable.
            ],
            'options' => [// Additional options for the Memcached connection.
                // Memcached::OPT_CONNECT_TIMEOUT => 2000,
            ],
            'servers' => [// List of Memcached servers to connect to.
                [
                    'host' => env('MEMCACHED_HOST', '127.0.0.1'),// The hostname of the Memcached server, defaulting to '
                    'port' => env('MEMCACHED_PORT', 11211),// The port of the Memcached server, defaulting to 11211.
                    'weight' => 100,// The weight of the server for load balancing.
                ],
            ],
        ],

        'redis' => [// A Redis-based cache store, which uses the Redis service for caching.
            'driver' => 'redis',// The cache driver type.
            'connection' => env('REDIS_CACHE_CONNECTION', 'cache'),// The Redis connection to use, which can be set via the REDIS_CACHE_CONNECTION environment variable, defaulting to 'cache' if not set.
            'lock_connection' => env('REDIS_CACHE_LOCK_CONNECTION', 'default'),// The Redis connection to use for locks, which can be set via the REDIS_CACHE_LOCK_CONNECTION environment variable, defaulting to 'default' if not set.
        ],

        'dynamodb' => [// A DynamoDB-based cache store, which uses AWS DynamoDB for caching.
            'driver' => 'dynamodb',// The cache driver type.
            'key' => env('AWS_ACCESS_KEY_ID'),// The AWS access key ID, which can be set via the AWS_ACCESS_KEY_ID environment variable.
            'secret' => env('AWS_SECRET_ACCESS_KEY'),// The AWS secret access key, which can be set via the AWS_SECRET_ACCESS_KEY environment variable.
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),// The AWS region, defaulting to 'us-east-1' if not set in the environment.
            'table' => env('DYNAMODB_CACHE_TABLE', 'cache'),// The DynamoDB table to use for caching, defaulting to 'cache' if not set in the environment.
            'endpoint' => env('DYNAMODB_ENDPOINT'),// The DynamoDB endpoint, which can be set via the DYNAMODB_ENDPOINT environment variable.
        ],

        'octane' => [// An Octane-based cache store, which uses Laravel Octane for caching.
            'driver' => 'octane',// The cache driver type.
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Cache Key Prefix
    |--------------------------------------------------------------------------
    |
    | When utilizing the APC, database, memcached, Redis, and DynamoDB cache
    | stores, there might be other applications using the same cache. For
    | that reason, you may prefix every cache key to avoid collisions.
    |
    */

    'prefix' => env('CACHE_PREFIX', Str::slug((string) env('APP_NAME', 'laravel')).'-cache-'),// The prefix to use for cache keys, which can be set via the CACHE_PREFIX environment variable. If not set, it defaults to a slugified version of the application name followed by '-cache-'.

];
