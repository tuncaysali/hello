<?php

namespace David\GiftCard\Setup\Patch\Data;

use David\GiftCard\Model\Type\GiftCard;
use Magento\Catalog\Model\Product as ProductType;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchVersionInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;

class ApplyAttributesUpdate implements DataPatchInterface, PatchVersionInterface
{
    public const PRICE_ATTR = 'price';

    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * ApplyAttributesUpdate constructor.
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param EavSetupFactory          $eavSetupFactory
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        \Magento\Eav\Setup\EavSetupFactory $eavSetupFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * @return ApplyAttributesUpdate|void
     */
    public function apply()
    {
        /** @var EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);

        $applyTo = explode(
            ',',
            $eavSetup->getAttribute(ProductType::ENTITY, self::PRICE_ATTR, 'apply_to')
        );
        if (!in_array(GiftCard::TYPE_CODE, $applyTo)) {
            $applyTo[] = GiftCard::TYPE_CODE;
            $eavSetup->updateAttribute(
                ProductType::ENTITY,
                self::PRICE_ATTR,
                'apply_to',
                implode(',', $applyTo)
            );
        }
    }

    public static function getDependencies()
    {
        return [];
    }

    public static function getVersion()
    {
        return '2.0.0';
    }

    /**
     * @return array
     */
    public function getAliases()
    {
        return [];
    }
}
