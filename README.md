# Health Check plugin for Craft CMS

Adds a health check route to your site to indicate that Craft is healthy and ready to accept web traffic from a load balancer.

## Installation

To install, follow these steps:

1) Install with Composer (recommended)

```
composer require benjamin-smith/craft-healthcheck
```

-OR- [download](https://github.com/benjamin-smith/craft-healthcheck/archive/master.zip) & unzip the codebase and place the `healthcheck` directory into your `craft/plugins` directory

2) Install plugin in the Craft Control Panel under Settings > Plugins

## Configuration

The [default configuration file](https://github.com/benjamin-smith/craftcms-healthcheck/blob/master/config.php) explains the various options that are available, and uses sensible defaults that do not necessarily require modification.

To customize the config, copy that file to `craft/config/healthcheck.php` and modify as needed.

## Usage

Once installed and configured, your health check URL should be responding to requests as expected (the default url is http://mydomain.com/health-check). If the site goes offline for any reason, a non 200 HTTP status code should be returned, which your load balancer should take as a signal to remove this site/server from the load balancer rotation.

## Roadmap

* Allow for whitelisting IP ranges using CIDR block notation.
