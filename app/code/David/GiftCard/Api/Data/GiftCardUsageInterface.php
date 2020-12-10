<?php


namespace David\GiftCard\Api\Data;

/**
 * Interface GiftCardInterface
 * @package David\GiftCard\Api\Data
 */
interface GiftCardUsageInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param $id
     * @return void
     */
    public function setId($id): void;

    /**
     * @return int
     */
    public function getGiftCardId(): int;

    /**
     * @param int $value
     */
    public function setGiftCardId(int $value): void;

    /**
     * @return int
     */
    public function getOrderId(): int;

    /**
     * @param int $value
     */
    public function setOrderId(int $value): void;

    /**
     * @return float
     */
    public function getValueChange(): float;

    /**
     * @param float $value
     */
    public function setValueChange(float $value): void;

    /**
     * @return \DateTime
     * @throws \Exception
     */
    public function getCreatedAt(): \DateTime;

    /**
     * @param \DateTime $value
     */
    public function setCreatedAt(\DateTime $value): void;

    /**
     * @return string
     */
    public function getNotes(): string;

    /**
     * @param string $value
     */
    public function setNotes(string $value): void;
}
