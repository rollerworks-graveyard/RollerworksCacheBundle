README
======

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/0ac03221-9d28-45b1-9652-c10299a66ad7/mini.png)](https://insight.sensiolabs.com/projects/0ac03221-9d28-45b1-9652-c10299a66ad7)
[![Build Status](https://secure.travis-ci.org/rollerworks/RollerworksCacheBundle.png?branch=master)](http://travis-ci.org/rollerworks/RollerworksCache)

The RollerworksCacheBundle provides the Symfony bundle configuration for the Rollerworks Cache Component.

> The Rollerworks Cache component provides a Session based cache-driver
> for Doctrine Common. (Cache data is stored in a session).

Installation
------------

RollerworksCacheBundle uses Composer to manage its dependencies.

If you don't have Composer yet, download it following the instructions on
http://getcomposer.org/ or just run the following command:

    curl -s http://getcomposer.org/installer | php

Then add the following to your
`composer.json` file:

```js
// composer.json
{
    // ...
    require: {
        // ...
        "rollerworks/cache-bundle": "master-dev"
    }
}
```

**NOTE**: Please replace `master-dev` in the snippet above with the latest stable
branch, for example ``1.0.*``.

Then, you can install the new dependencies by running Composer's ``update``
command from the directory where your ``composer.json`` file is located:

```bash
$ php composer.phar update rollerworks/cache-bundle
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

Finally, add the following to your config file:

``` yaml
# app/config/config.yml

rollerworks_cache:
    session: ~

    # or more verbose
    session:
        # Optional storage key that used for storing the session
        storage_key: _rollerworks_cache

        # Optional session-bag name
        bag_name: cache
```

Congratulations! You're ready!

    You can get the session-storage Cache-Driver service with
    "rollerworks_cache.driver.session_driver".

Resources
---------

This Component is released under MIT license.

You can run the unit tests with the following command:

    phpunit
