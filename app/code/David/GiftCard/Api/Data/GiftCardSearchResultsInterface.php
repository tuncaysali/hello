<?php

namespace David\GiftCard\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface GiftCardSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get Gift Card list.
     * @return GiftCardInterface[]
     */
    public function getItems();

    /**
     * Set Gift Card list.
     * @param GiftCardInterface[] $items
     * @return GiftCardSearchResultsInterface
     */
    public function setItems(array $items);
}
