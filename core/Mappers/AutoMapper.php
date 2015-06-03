<?php

namespace App\Core\Mappers;

use Illuminate\Database\Eloquent\Model;

/**
 * Perform data mappings on model and array attributes.
 *
 * @category Mapper
 * @author Abed Halawi <abed.halawi@vinelab.com>
 */
abstrac class AutoMapper
{
    /**
     * Map the given attributes or model into its array form.
     *
     * @param  \Illuminate\Database\Eloquent\Model|array $attributes
     *
     * @return array
     */
    public function map($attributes)
    {
        return $this->mapAttribtues($attributes);
    }

    /**
     * Map the given attributes into their respective form and data type.
     * Relies on the casts in a model when getting its array representation
     * and mapper methods for each attributes.
     *
     * i.e. To map the property "title" of an article, you would define a method
     * called `mapTitle($title)` and return the mapped representation there.
     *
     * @param \Illuminate\Database\Eloquent\Model|array  $attributes
     * @return [type]             [description]
     */
    public function mapAttribtues($attributes)
    {
        // we're only interested in array attributes
        // so if it's a model we try to convert it.
        if ($attributes instanceof Model) {
            $attributes = $attributes->toArray();
        }

        $mapped = [];

        foreach ($attributes as $attribute => $value) {
            $method = "map{$attribute}";
            // when the mapping method is found for the specific
            // attribute we call it to get the mapped value.
            if (method_exists($this, $method)) {
                $value = $this->$method($value);
            }

            $mapped[$attribute] = $value;
        }

        return $mapped;
    }
}
