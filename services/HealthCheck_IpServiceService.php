<?php
namespace Craft;

class HealthCheck_IpServiceService extends BaseApplicationComponent
{

    /**
     * Determine if a given IP is in an IP whitelist array
     * @param  array  $ipWhitelist
     * @param  string $ip
     * @return boolean
     */
    public function ipIsWhitelisted(array $ipWhitelist, $ip)
    {
        $ipWhitelist = array_map('trim', $ipWhitelist);
        return in_array($ip, $ipWhitelist);
    }

}
