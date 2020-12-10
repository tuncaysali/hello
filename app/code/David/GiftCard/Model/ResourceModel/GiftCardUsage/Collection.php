<?php


namespace David\GiftCard\Model\ResourceModel\GiftCardUsage;


use David\GiftCard\Model\GiftCardUsage as GiftCardUsageModel;
use David\GiftCard\Model\ResourceModel\GiftCardUsage as GiftCardUsageResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(GiftCardUsageModel::class, GiftCardUsageResource::class);
    }
}
