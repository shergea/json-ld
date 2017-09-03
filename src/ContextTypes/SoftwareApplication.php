<?php
namespace JsonLd\ContextTypes;
class SoftwareApplication extends SoftwareApplicationAbstractContext
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'name' => null,
        'description' => null,
        'applicationCategory'=>null,
        'applicationSubCategory'=>null,
        'fileSize'=>null,
        'inLanguage'=>null,
        'datePublished'=>null,
        'screenshot' => null,
        'image' => null,
        'softwareVersion' => null,
        'url' => null,
        'downloadUrl' => null,
        'aggregateRating' => AggregateRating::class,
        'offers' => Offer::class,

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
