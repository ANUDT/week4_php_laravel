<?php

use Illuminate\Support\Str;// Import the Str class to assist with string manipulations.

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for database operations. This is
    | the connection which will be utilized unless another connection
    | is explicitly specified when you execute a query / statement.
    |
    */

    'default' => env('DB_CONNECTION', 'sqlite'),// The default database connection, which can be set via the DB_CONNECTION environment variable, defaulting to 'sqlite' if not set.

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Below are all of the database connections defined for your application.
    | An example configuration is provided for each database system which
    | is supported by Laravel. You're free to add / remove connections.
    |
    */

    'connections' => [ // Definition of various database connections.

    'sqlite' => [
    'driver' => 'sqlite',  // Use the SQLite database driver
    'url' => env('DB_URL'),  // Database URL (optional, can override individual settings)
    'database' => env('DB_DATABASE', database_path('database.sqlite')),  // SQLite file location
    'prefix' => '',  // Prefix for table names (empty = no prefix)
    'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),  // Enable/disable foreign key constraints
    'busy_timeout' => null,  // Timeout for locked database operations
    'journal_mode' => null,  // SQLite journaling mode (e.g. WAL)
    'synchronous' => null,  // Synchronous mode (balance between speed and durability)
    'transaction_mode' => 'DEFERRED',  // Transaction mode (DEFERRED, IMMEDIATE, EXCLUSIVE)
],


    'mysql' => [
    'driver' => 'mysql',  // Use MySQL driver
    'url' => env('DB_URL'),  // Database URL
    'host' => env('DB_HOST', '127.0.0.1'),  // Host (default: localhost)
    'port' => env('DB_PORT', '3306'),  // MySQL port (default 3306)
    'database' => env('DB_DATABASE', 'laravel'),  // Database name
    'username' => env('DB_USERNAME', 'root'),  // Database user
    'password' => env('DB_PASSWORD', ''),  // Database password
    'unix_socket' => env('DB_SOCKET', ''),  // Unix socket for MySQL connections
    'charset' => env('DB_CHARSET', 'utf8mb4'),  // Character set
    'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),  // Collation (sorting rules)
    'prefix' => '',  // Table name prefix
    'prefix_indexes' => true,  // Prefix also applies to index names
    'strict' => true,  // Strict SQL mode (prevents bad data)
    'engine' => null,  // Default storage engine (InnoDB if null)
    'options' => extension_loaded('pdo_mysql') ? array_filter([
        PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),  // SSL cert for secure connections
    ]) : [],
],


    'mariadb' => [ // MariaDB connection configuration, similar to MySQL.
    'driver' => 'mariadb',
    'url' => env('DB_URL'),
    'host' => env('DB_HOST', '127.0.0.1'),
    'port' => env('DB_PORT', '3306'),
    'database' => env('DB_DATABASE', 'laravel'),
    'username' => env('DB_USERNAME', 'root'),
    'password' => env('DB_PASSWORD', ''),
    'unix_socket' => env('DB_SOCKET', ''),
    'charset' => env('DB_CHARSET', 'utf8mb4'),
    'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
    'prefix' => '',
    'prefix_indexes' => true,
    'strict' => true,
    'engine' => null,
    'options' => extension_loaded('pdo_mysql') ? array_filter([
    PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
 ]) : [],
],

    'pgsql' => [
    'driver' => 'pgsql',  // Use PostgreSQL driver
    'url' => env('DB_URL'),  // Database URL
    'host' => env('DB_HOST', '127.0.0.1'),  // Host
    'port' => env('DB_PORT', '5432'),  // Default PostgreSQL port
    'database' => env('DB_DATABASE', 'laravel'),  // Database name
    'username' => env('DB_USERNAME', 'root'),  // User
    'password' => env('DB_PASSWORD', ''),  // Password
    'charset' => env('DB_CHARSET', 'utf8'),  // Character set
    'prefix' => '',  // Table prefix
    'prefix_indexes' => true,  // Prefix index names
    'search_path' => 'public',  // Default schema to use
    'sslmode' => 'prefer',  // SSL mode (disable, allow, prefer, require)
],


    'sqlsrv' => [
    'driver' => 'sqlsrv',  // Use Microsoft SQL Server driver
    'url' => env('DB_URL'),  // Database URL
    'host' => env('DB_HOST', 'localhost'),  // Host
    'port' => env('DB_PORT', '1433'),  // Default SQL Server port
    'database' => env('DB_DATABASE', 'laravel'),  // Database name
    'username' => env('DB_USERNAME', 'root'),  // User
    'password' => env('DB_PASSWORD', ''),  // Password
    'charset' => env('DB_CHARSET', 'utf8'),  // Character set
    'prefix' => '',  // Table prefix
    'prefix_indexes' => true,  // Prefix index names
    // 'encrypt' => env('DB_ENCRYPT', 'yes'),  // (optional) Encrypt connection
    // 'trust_server_certificate' => env('DB_TRUST_SERVER_CERTIFICATE', 'false'),  // (optional) Bypass cert validation
],


    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run on the database.
    |
    */

    'migrations' => [
        'table' => 'migrations',
        'update_date_on_publish' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as Memcached. You may define your connection settings here.
    |
    */

    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug((string) env('APP_NAME', 'laravel')).'-database-'),
            'persistent' => env('REDIS_PERSISTENT', false),
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
            'max_retries' => env('REDIS_MAX_RETRIES', 3),
            'backoff_algorithm' => env('REDIS_BACKOFF_ALGORITHM', 'decorrelated_jitter'),
            'backoff_base' => env('REDIS_BACKOFF_BASE', 100),
            'backoff_cap' => env('REDIS_BACKOFF_CAP', 1000),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
            'max_retries' => env('REDIS_MAX_RETRIES', 3),
            'backoff_algorithm' => env('REDIS_BACKOFF_ALGORITHM', 'decorrelated_jitter'),
            'backoff_base' => env('REDIS_BACKOFF_BASE', 100),
            'backoff_cap' => env('REDIS_BACKOFF_CAP', 1000),
        ],

    ],

];
