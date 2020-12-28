<?php

namespace David\GiftCard\Model\Type;

use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\Product\Type\AbstractType;

class GiftCard extends AbstractType
{
    public const TYPE_CODE = 'gift_card';

    /**
     * Check is virtual product
     *
     * @param Product $product
     * @return bool
     */
    public function isVirtual($product): bool
    {
        return true;
    }

    /**
     * Check that product of this type has weight
     *
     * @return bool
     */
    public function hasWeight(): bool
    {
        return false;
    }

    /**
     * Delete data specific for Virtual product type
     *
     * @param Product $product
     * @return void
     */
    public function deleteTypeSpecificData(Product $product)
    {
    }
}
