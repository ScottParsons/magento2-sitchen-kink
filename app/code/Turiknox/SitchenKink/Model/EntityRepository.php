<?php
/*
 * Turiknox_SitchenKink

 * @category   Turiknox
 * @package    Turiknox_SitchenKink
 * @copyright  Copyright (c) 2017 Turiknox
 * @license    https://github.com/Turiknox/magento2-sitchen-kink/blob/master/LICENSE.md
 * @version    1.0.1
 */
namespace Turiknox\SitchenKink\Model;

use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\Search\FilterGroup;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\StateException;
use Magento\Framework\Exception\ValidatorException;
use Magento\Framework\Exception\NoSuchEntityException;
use Turiknox\SitchenKink\Api\EntityRepositoryInterface;
use Turiknox\SitchenKink\Api\Data\EntityInterface;
use Turiknox\SitchenKink\Api\Data\EntityInterfaceFactory;
use Turiknox\SitchenKink\Api\Data\EntitySearchResultsInterfaceFactory;
use Turiknox\SitchenKink\Model\ResourceModel\Entity as ResourceEntity;
use Turiknox\SitchenKink\Model\ResourceModel\Entity\CollectionFactory as EntityCollectionFactory;

class EntityRepository implements EntityRepositoryInterface
{
    /**
     * @var array
     */
    protected $instances = [];

    /**
     * @var ResourceEntity
     */
    protected $resource;

    /**
     * @var EntityCollectionFactory
     */
    protected $entityCollectionFactory;

    /**
     * @var EntitySearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;

    /**
     * @var EntityInterfaceFactory
     */
    protected $entityInterfaceFactory;

    /**
     * @var DataObjectHelper
     */
    protected $dataObjectHelper;

    public function __construct(
        ResourceEntity $resource,
        EntityCollectionFactory $entityCollectionFactory,
        EntitySearchResultsInterfaceFactory $entitySearchResultsInterfaceFactory,
        EntityInterfaceFactory $entityInterfaceFactory,
        DataObjectHelper $dataObjectHelper
    ) {
        $this->resource = $resource;
        $this->entityCollectionFactory = $entityCollectionFactory;
        $this->searchResultsFactory = $entitySearchResultsInterfaceFactory;
        $this->entityInterfaceFactory = $entityInterfaceFactory;
        $this->dataObjectHelper = $dataObjectHelper;
    }

    /**
     * @param EntityInterface $entity
     * @return EntityInterface
     * @throws CouldNotSaveException
     */
    public function save(EntityInterface $entity)
    {
        try {
            /** @var EntityInterface|\Magento\Framework\Model\AbstractModel $entity */
            $this->resource->save($entity);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the entity: %1',
                $exception->getMessage()
            ));
        }
        return $entity;
    }

    /**
     * Get entity record
     *
     * @param $entityId
     * @return mixed
     * @throws NoSuchEntityException
     */
    public function getById($entityId)
    {
        if (!isset($this->instances[$entityId])) {
            /** @var \Turiknox\SitchenKink\Api\Data\EntityInterface|\Magento\Framework\Model\AbstractModel $entity */
            $entity = $this->entityInterfaceFactory->create();
            $this->resource->load($entity, $entityId);
            if (!$entity->getId()) {
                throw new NoSuchEntityException(__('Requested entity doesn\'t exist'));
            }
            $this->instances[$entityId] = $entity;
        }
        return $this->instances[$entityId];
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return \[Vendor]\[Module]\Api\Data\EntitySearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        /** @var \Turiknox\SitchenKink\Api\Data\EntitySearchResultsInterface $searchResults */
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);

        /** @var \Turiknox\SitchenKink\Model\ResourceModel\Entity\Collection $collection */
        $collection = $this->entityCollectionFactory->create();

        //Add filters from root filter group to the collection
        /** @var FilterGroup $group */
        foreach ($searchCriteria->getFilterGroups() as $group) {
            $this->addFilterGroupToCollection($group, $collection);
        }
        $sortOrders = $searchCriteria->getSortOrders();
        /** @var SortOrder $sortOrder */
        if ($sortOrders) {
            foreach ($searchCriteria->getSortOrders() as $sortOrder) {
                $field = $sortOrder->getField();
                $collection->addOrder(
                    $field,
                    ($sortOrder->getDirection() == SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
                );
            }
        } else {
            $field = 'entity_id';
            $collection->addOrder($field, 'ASC');
        }
        $collection->setCurPage($searchCriteria->getCurrentPage());
        $collection->setPageSize($searchCriteria->getPageSize());

        $data = [];
        foreach ($collection as $datum) {
            $dataDataObject = $this->entityInterfaceFactory->create();
            $this->dataObjectHelper->populateWithArray($dataDataObject, $datum->getData(), EntityInterface::class);
            $data[] = $dataDataObject;
        }
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults->setItems($data);
    }

    /**
     * @param EntityInterface $entity
     * @return bool
     * @throws CouldNotSaveException
     * @throws StateException
     */
    public function delete(EntityInterface $entity)
    {
        /** @var \Turiknox\SitchenKink\Api\Data\EntityInterface|\Magento\Framework\Model\AbstractModel $entity */
        $id = $entity->getId();
        try {
            unset($this->instances[$id]);
            $this->resource->delete($entity);
        } catch (ValidatorException $e) {
            throw new CouldNotSaveException(__($e->getMessage()));
        } catch (\Exception $e) {
            throw new StateException(
                __('Unable to remove entity %1', $id)
            );
        }
        unset($this->instances[$id]);
        return true;
    }

    /**
     * @param $entityId
     * @return bool
     */
    public function deleteById($entityId)
    {
        $entity = $this->getById($entityId);
        return $this->delete($entity);
    }
}
