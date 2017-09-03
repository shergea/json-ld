<?php

namespace JsonLd\ContextTypes;

class ListItem extends AbstractContext
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'position' => null,
        'item' => null,
    ];

    /**
     * Set item in list.
     *
     * @param  array $item
     * @return array
     */
    protected function setItemAttribute($item)
    {
        return [
            '@type' =>'ListItem',
            'name' => $this->getArrValue($item, 'name'),
            'url'=> $this->getArrValue($item, 'url')
        ];
    }
}