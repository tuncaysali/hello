<?php


namespace David\GiftCard\Model\ResourceModel;


class GiftCard extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init('gift_card', 'id');
    }
}
