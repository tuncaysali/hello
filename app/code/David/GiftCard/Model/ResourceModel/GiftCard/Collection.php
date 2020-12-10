<?php


namespace David\GiftCard\Model\ResourceModel\GiftCard;


use David\GiftCard\Model\GiftCard as GiftCardModel;
use David\GiftCard\Model\ResourceModel\GiftCard as GiftCardResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(GiftCardModel::class, GiftCardResource::class);
    }
}
