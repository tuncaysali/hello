<?php

namespace David\GiftCard\Model\Repository;

use David\GiftCard\Api\Data\GiftCardInterface;
use David\GiftCard\Api\Data\GiftCardSearchResultsInterfaceFactory as SearchResultsFactory;
use David\GiftCard\Model\GiftCardFactory;
use David\GiftCard\Model\ResourceModel\GiftCard as GiftCardResourceModel;
use David\GiftCard\Model\ResourceModel\GiftCard\CollectionFactory as GiftCardCollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;


class GiftCardRepository
{
    /**
     * @var GiftCardResourceModel
     */
    protected $resource;

    /**
     * @var GiftCardFactory
     */
    protected $modelFactory;

    /**
     * @var GiftCardCollectionFactory
     */
    protected $collectionFactory;

    /**
     * @var SearchResultsFactory
     */
    protected $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    public function __construct(
        GiftCardResourceModel $resource,
        GiftCardFactory $giftCardFactory,
        GiftCardCollectionFactory $giftCardCollectionFactory,
        SearchResultsFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->modelFactory = $giftCardFactory;
        $this->collectionFactory = $giftCardCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @param GiftCardInterface $giftCard
     * @return GiftCardInterface
     * @throws CouldNotSaveException
     */
    public function save(GiftCardInterface $giftCard)
    {
        try {
            $this->resource->save($giftCard);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $giftCard;
    }

    public function getById(int $giftCardId): GiftCardInterface
    {
        $giftCard = $this->modelFactory->create();
        $this->resource->load($giftCard, $giftCardId);
        if (!$giftCard->getId()) {
            throw new NoSuchEntityException(__('The Gift Card with the "%1" ID doesn\'t exist.', $giftCardId));
        }

        return $giftCard;
    }

    public function getByCode(string $code): GiftCardInterface
    {
        $giftCard = $this->modelFactory->create();
        $this->resource->load($giftCard, $code, 'code');
        if (!$giftCard->getId()) {
            throw new NoSuchEntityException(__('The Gift Card with the code: "%1" doesn\'t exist.', $code));
        }

        return $giftCard;
    }

    public function getList(SearchCriteriaInterface $criteria)
    {
        /** @var \David\GiftCard\Model\ResourceModel\GiftCard\Collection $collection */
        $collection = $this->blockCollectionFactory->create();

        $this->collectionProcessor->process($criteria, $collection);

        /** @var SearchResultsFactory $searchResults */
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    public function delete(GiftCardInterface $giftCard)
    {
        try {
            $this->resource->delete($giftCard);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }

    public function deleteById(int $giftCardId)
    {
        return $this->delete($this->getById($giftCardId));
    }
}
