<?php
namespace JsonLd\ContextTypes;
class Product extends ProductAbstractContext
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'name' => null,
        'description' => null,
        'brand' => Brand::class,
        'image' => null,
        'sku' => null,
        'url' => null,
        'review' => null,
        'aggregateRating' => AggregateRating::class,
        'offers' => Offer::class,
        'gtin8' => null,
        'gtin13' => null,
        'gtin14' => null,
        'mpn' => null,
        'category' => null,
        'model' => null
    ];

    /**
     * Set in album attribute
     *
     * @param array|string $items
     * @return array
     */
    protected function setReviewAttribute($items)
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
        //multiple albums
        return array_map(function ($item) {
            return $this->getNestedContext(Review::class, $item);
        }, $items);
    }


}
