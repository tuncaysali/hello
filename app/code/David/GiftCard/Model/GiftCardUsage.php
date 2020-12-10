<?php

namespace David\GiftCard\Model;

use David\GiftCard\Api\Data\GiftCardUsageInterface;
use Magento\Framework\Model\AbstractModel;
use David\GiftCard\Model\ResourceModel\GiftCardUsage as GiftCardUsageResource;

class GiftCardUsage extends AbstractModel implements GiftCardUsageInterface
{
    protected function _construct()
    {
        $this->_init(GiftCardUsageResource::class);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return (int)$this->getData('id');
    }

    /**
     * @param int $value
     */
    public function setId($value): void
    {
        $this->setData('id', $value);
    }

    /**
     * @return int
     */
    public function getGiftCardId(): int
    {
        return (int)$this->getData('gift_card_id');
    }

    /**
     * @param int $value
     */
    public function setGiftCardId(int $value): void
    {
        $this->setData('gift_card_id', $value);
    }

    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return (int)$this->getData('order_id');
    }

    /**
     * @param int $value
     */
    public function setOrderId(int $value): void
    {
        $this->setData('order_id', $value);
    }

    /**
     * @return float
     */
    public function getValueChange(): float
    {
        return (float)$this->getData('value_change');
    }

    /**
     * @param float $value
     */
    public function setValueChange(float $value): void
    {
        $this->setData('value_change', $value);
    }

    /**
     * @return \DateTime
     * @throws \Exception
     */
    public function getCreatedAt(): \DateTime
    {
        return new \DateTime($this->getData('created_at')->getFormat('Y-m-d h:i:s'));
    }

    /**
     * @param \DateTime $value
     */
    public function setCreatedAt(\DateTime $value): void
    {
        $this->setData('created_at', $value);
    }

    /**
     * @return string
     */
    public function getNotes(): string
    {
        return (string)$this->getData('notes');
    }

    /**
     * @param string $value
     */
    public function setNotes(string $value): void
    {
        $this->setData('notes', $value);
    }
}
