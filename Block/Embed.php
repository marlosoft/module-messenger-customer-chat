<?php

namespace Marlosoft\MessengerCustomerChat\Block;

use Magento\Framework\View\Element\Template;
use Marlosoft\MessengerCustomerChat\Helper\Data;

/**
 * Class Embed
 * @package Marlosoft\MessengerCustomerChat\Block
 */
class Embed extends Template
{
    /** @var Data $helper */
    private $helper;

    /**
     * Embed constructor.
     *
     * @param Data $helper
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(Data $helper, Template\Context $context, array $data = [])
    {
        parent::__construct($context, $data);
        $this->helper = $helper;
    }

    /** @return Data */
    public function getHelper()
    {
        return $this->helper;
    }
}
