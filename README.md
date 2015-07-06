RollerworksCacheBundle
======================

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/0ac03221-9d28-45b1-9652-c10299a66ad7/mini.png)](https://insight.sensiolabs.com/projects/0ac03221-9d28-45b1-9652-c10299a66ad7)
[![Build Status](https://secure.travis-ci.org/rollerworks/RollerworksCacheBundle.png?branch=master)](http://travis-ci.org/rollerworks/RollerworksCache)

This bundle integrates the Rollerworks Cache Component in your Symfony application.

> The Rollerworks Cache component provides a Session based cache-driver
> for Doctrine Common. (Cache data is stored in a session).

Installation
------------

The RollerworksCacheBundle uses Composer to manage its dependencies.

If you don't have Composer yet, download it following the instructions on
http://getcomposer.org/

Then add the `rollerworks/cache-bundle` package to your composer.json with:

```bash
$ composer require "rollerworks/cache-bundle"
```

Now, Composer will automatically download all required files, and install them
for you. All that is left to do is to update your ``AppKernel.php`` file, and
register the new bundle:

```php
<?php

// in AppKernel::registerBundles()
$bundles = array(
    // ...
    new Rollerworks\Bundle\CacheBundle\RollerworksCacheBundle(),
    // ...
);
```

Configure the bundle
--------------------

The bundle is comes pre-configured, ready for usage.
But for clarity, add the following to your config file:

``` yaml
# app/config/config.yml

rollerworks_cache:
    session:
        # Storage key that used for storing the session
        storage_key: _rollerworks_cache

        # Session-bag name
        bag_name: cache
```

Congratulations! You're ready!

    You can get the session-storage Cache-Driver service with
    "rollerworks_cache.driver.session_driver".

Resources
---------

This Component is released under MIT license.
