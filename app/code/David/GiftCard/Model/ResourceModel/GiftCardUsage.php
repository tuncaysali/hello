<?php


namespace David\GiftCard\Model\ResourceModel;


class GiftCardUsage extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init('gift_card_usage', 'id');
    }
}
