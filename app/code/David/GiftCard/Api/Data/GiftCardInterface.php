<?php


namespace David\GiftCard\Api\Data;

/**
 * Interface GiftCardInterface
 * @package David\GiftCard\Api\Data
 */
interface GiftCardInterface
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
    public function getCustomerId(): int;

    /**
     * @param int $value
     */
    public function setCustomerId(int $value): void;

    /**
     * @return string
     */
    public function getCode(): string;

    /**
     * @param string $value
     */
    public function setCode(string $value): void;

    /**
     * @return int
     */
    public function getStatus(): int;

    /**
     * @param int $value
     */
    public function setStatus(int $value): void;

    /**
     * @return float
     */
    public function getInitialValue(): float;

    /**
     * @param float $value
     */
    public function setInitialValue(float $value): void;

    /**
     * @return float
     */
    public function getCurrentValue(): float;

    /**
     * @param float $value
     */
    public function setCurrentValue(float $value): void;

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime;

    /**
     * @param \DateTime $value
     */
    public function setCreatedAt(\DateTime $value): void;

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime;

    /**
     * @param \DateTime $value
     */
    public function setUpdatedAt(\DateTime $value): void;

    /**
     * @return string
     */
    public function getRecipientEmail(): string;

    /**
     * @param string $value
     */
    public function setRecipientEmail(string $value): void;

    /**
     * @return string
     */
    public function getRecipientName(): string;

    /**
     * @param string $value
     */
    public function setRecipientName(string $value): void;
}
