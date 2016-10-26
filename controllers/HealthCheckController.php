<?php
namespace Craft;

class HealthCheckController extends BaseController
{

    protected $allowAnonymous = array('actionRenderHealthCheck');

    /**
     * Render site status for a load balancer health check.
     *
     * This route does *not* determine if the site is "unhealthy". Craft
     * CMS is smart enough to send a 500 error if the site is offline,
     * including if the database is unavailable or some other dependency
     * is not met. This method simply ensures the request is authorized,
     * and returns a "success" response based on the plugin config.
     */
    public function actionRenderHealthCheck()
    {
        // only allow whitelisted IPs past this point
        $ipWhitelist = $this->getSetting('ipWhitelist');
        if ($ipWhitelist!==false) {
            if (!is_array($ipWhitelist)) {
                throw new Exception('[Health Check] $ipWhitelist must be either false or an array.');
            }

            $userIp = craft()->request->getIpAddress();
            if (craft()->healthCheck_ipService->ipIsWhitelisted($ipWhitelist, $userIp)===false) {
                // 404 rather than 401 to not leak the existance of this route
                throw new HttpException(404);
            }
        }

        // we're healthy, output to browser
        switch ($this->getSetting('successOutputFormat')) {

            case 'json':
                // respond with json
                return $this->returnJson(array('healthy' => true));

            case 'text':
                // set our local tempalte path
                $templatesPath = craft()->path->getPluginsPath().'healthcheck/templates/';
                craft()->path->setTemplatesPath($templatesPath);

                // output status to template
                return $this->renderTemplate('healthCheckText', array('statusText' => 'true'));

            default:
                // plugin is misconfigured
                throw new Exception('[Health Check] Only "text" or "json" are valid optins for $successOutputFormat');
        }
    }

    protected function getSetting($setting)
    {
        return craft()->config->get($setting, 'healthcheck');
    }

}
