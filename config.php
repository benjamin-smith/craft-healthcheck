<?php

return array(

    /**
     * URL path for the health check route.
     *
     * Do not prefix with siteUrl or a leading slash. For example,
     * for http://example.com/my/health/check, set this variable to
     * 'my/health/check'.
     */
    'url' => 'health-check',

    /**
     * Set of IP addresses that can access the health check route.
     *
     * Can be an array of IP addresses, or set to false to disable
     * the whitelist (and allow any IP to ping the heath check).
     *
     * Note that many cloud/hosted load balancers (such as Amazon
     * Elastic Load Balancer or Rackspace Cloud Load Balancer) do
     * not have a static IP available. If that is the case, disable
     * the whitelist setting here.
     */
    'ipWhitelist' => false,

    /**
     * Format for the "success" message. Options are 'json' or 'text'.
     *
     * Note that if Craft throws an error for any reason (i.e. the
     * database is unavaiable), a Craft error page will be returned
     * with the appropriate HTTP status code.
     */
    'successOutputFormat' => 'json',

);
