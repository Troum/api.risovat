<?php


namespace App\Traits;
use Illuminate\Support\Collection;

trait Parsing
{
    /**
     * @param $array
     * @return Collection
     */
    public function convert($array)
    {
        $collection = collect($array);
        return $collection->map(function($item, $key) {
            $string = new \stdClass();
            $string->id = $item->id;
            $string->title = $item->title;
            $string->content = $item->content;
            $string->connection = $item->connection ? explode(',', $item->connection) : null;
            $string->created_at = $item->created_at;
            $string->updated_at = $item->updated_at;
            return $string;
        });
    }
}
