<?php

namespace JsonLd\ContextTypes;

class ItemList extends AbstractContext
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'url'=>null,
        'name'=>null,
        'description'=>null,
        'itemListElement' => null,
    ];

    /**
     * Set the canonical URL of the article page.
     *
     * @param  array $items
     * @return array
     */
    protected function setItemListElementAttribute($items)
    {
        foreach($items as $pos=>$item) {
            $items[$pos] = $this->getNestedContext(ListItem::class, [
                'position' => $pos + 1,
                'item' => $item
            ]);
        }

        return $items;
    }
}