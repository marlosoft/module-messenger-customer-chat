<?php

namespace Marlosoft\MessengerCustomerChat\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\Locale\Resolver;
use Magento\Store\Model\ScopeInterface;

/**
 * Class Data
 * @package Marlosoft\MessengerCustomerChat\Helper
 */
class Data extends AbstractHelper
{
    const CONFIG_PATH_FORMAT = 'marlosoft/messenger_customer_chat/%s';
    const SDK_URL_FORMAT = 'https://connect.facebook.net/%s/sdk/xfbml.customerchat.js';

    /** @var Resolver $locale */
    private $locale;

    /**
     * @param string $path
     * @return mixed
     */
    private function getConfigValue($path)
    {
        return $this->scopeConfig->getValue(sprintf(self::CONFIG_PATH_FORMAT, $path), ScopeInterface::SCOPE_STORE);
    }

    /**
     * Data constructor.
     * @param Resolver $locale
     * @param Context $context
     */
    public function __construct(Resolver $locale, Context $context)
    {
        parent::__construct($context);
        $this->locale = $locale;
    }

    /** @return string */
    public function getAttributes()
    {
        $configurations = array_filter([
            'page_id' => (int)$this->getConfigValue('page_id'),
            'theme_color' => (string)$this->getConfigValue('theme_color'),
            'logged_in_greeting' => htmlentities($this->getConfigValue('logged_in_greeting')),
            'logged_out_greeting' => htmlentities($this->getConfigValue('logged_out_greeting')),
            'greeting_dialog_display' => (string)$this->getConfigValue('greeting_dialog_display'),
            'greeting_dialog_delay' => (int)$this->getConfigValue('greeting_dialog_delay'),
        ]);

        $attributes = [];
        foreach ($configurations as $k => $v) {
            $attributes[] = sprintf('%s="%s"', $k, $v);
        }

        return implode(' ', $attributes);
    }

    /** @return string */
    public function getJsSdkUrl()
    {
        return sprintf(self::SDK_URL_FORMAT, $this->locale->getLocale());
    }
}
