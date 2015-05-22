<?php

namespace wh\rbac\models;

use yii\helpers\ArrayHelper;

class Role extends AuthItem
{
    /** @inheritdoc */
    public function getUnassignedItems()
    {
        return ArrayHelper::map(
            $this->manager->getItems(null, $this->item !== null ? [$this->item->name] : []), 
            'name', 
            function ($item) {
                return empty($item->description) ? $item->name : $item->name . ' (' . $item->description . ')';
            });
    }

    /** @inheritdoc */
    protected function createItem($name)
    {
        return $this->manager->createRole($name);
    }
}