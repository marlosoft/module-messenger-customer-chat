<?php

namespace Marlosoft\MessengerCustomerChat\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

/**
 * Class Display
 * @package Marlosoft\MessengerCustomerChat\Model\Config\Source
 */
class Display implements ArrayInterface
{
    /** @return array */
    public function toOptionArray()
    {
        return [
            ['value' => 'show', 'label' => 'Show'],
            ['value' => 'hide', 'label' => 'Hide'],
            ['value' => 'fade', 'label' => 'Fade'],
        ];
    }
}
