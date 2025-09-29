<?php

return [ // Start of the configuration array.

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application, which will be used when the
    | framework needs to place the application's name in a notification or
    | other UI elements where an application name needs to be displayed.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),// The name of the application, defaulting to 'Laravel' if not set in the environment.

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'), // The application environment, defaulting to 'production' if not set in the environment.

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false), // Debug mode setting, defaulting to false if not set in the environment.

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | the application so that it's available within Artisan commands.
    |
    */

    'url' => env('APP_URL', 'http://localhost'), // The base URL of the application, defaulting to 'http://localhost' if not set in the environment.

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. The timezone
    | is set to "UTC" by default as it is suitable for most use cases.
    |
    */

    'timezone' => 'UTC',// The default timezone for the application.

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by Laravel's translation / localization methods. This option can be
    | set to any locale for which you plan to have translation strings.
    |
    */

    'locale' => env('APP_LOCALE', 'en'),// The default locale for the application.

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),// The fallback locale to use when the current locale is not available.

    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),// The locale used by the Faker library for generating fake data.

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is utilized by Laravel's encryption services and should be set
    | to a random, 32 character string to ensure that all encrypted values
    | are secure. You should do this prior to deploying the application.
    |
    */

    'cipher' => 'AES-256-CBC',// The encryption cipher used by the application.

    'key' => env('APP_KEY'),// The encryption key for the application.

    'previous_keys' => [ // An array of previous encryption keys for key rotation.
        ...array_filter( // Filter out any empty values.
            explode(',', (string) env('APP_PREVIOUS_KEYS', '')) // Get previous keys from the environment variable and split by commas.
        ),
    ],

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | These configuration options determine the driver used to determine and
    | manage Laravel's "maintenance mode" status. The "cache" driver will
    | allow maintenance mode to be controlled across multiple machines.
    |
    | Supported drivers: "file", "cache"
    |
    */

    'maintenance' => [ // Configuration for maintenance mode.
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'), // The driver used for maintenance mode, defaulting to 'file' if not set in the environment.
        'store' => env('APP_MAINTENANCE_STORE', 'database'), // The store used for the cache driver, defaulting to 'database' if not set in the environment.
    ],

];
