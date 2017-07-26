<?php

namespace JsonLd\ContextTypes;

abstract class ProductAbstractContext extends AbstractContext
{

    /**
     * Set artist attribute
     *
     * @param array|string $items
     * @return array
     */
    protected function setByReviewAttribute($items)
    {
        if ( ! is_array($items))
        {
            return $items;
        }
        //Check if not multidimensional array (for backward compatibility)
        if((count($items) == count($items, COUNT_RECURSIVE)))
        {
            return $this->getNestedContext(Review::class, $items);
        }
        //multiple artists
        return array_map(function ($item) {
            return $this->getNestedContext(Review::class, $item);
        }, $items);
    }
}
