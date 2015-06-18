<?php

namespace wh\rbac\models;
use yii\helpers\ArrayHelper;
use yii\rbac\Item;

class Permission extends AuthItem
{
    /** @inheritdoc */
    public function getUnassignedItems()
    {
        return ArrayHelper::map(
            //$this->manager->getItems(Item::TYPE_PERMISSION, $this->item !== null ? [$this->item->name] : []),
            $this->getItems(),
            'name', 
            function ($item) {
                return empty($item->description) ? $item->name : $item->name . ' (' . $item->description . ')';
            });
    }

    protected function getItems()
    {
        return $this->manager->getPermissions();
    }

    /** @inheritdoc */
    protected function createItem($name)
    {
        return $this->manager->createPermission($name);
    }
}