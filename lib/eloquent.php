<?php

namespace CodebyCore\Eloquent;

use WP_Query;

class Eloquent {

    public int $page;
    public array $query = [];
    public int $limit = 10;

    function __construct() {
        return $this;
    }

    function where(string $field, mixed $value): Eloquent {
        $this->query[$field] = $value;
        return $this;
    }

    function skip(mixed $skip, int $fallback = 0): Eloquent {
        $this->query['offset'] = intval($skip, $fallback);
        return $this;
    }

    function limit(mixed $limit, int $fallback = 0): Eloquent {
        $this->query['posts_per_page'] = intval($limit, $fallback);
        return $this;
    }

    function page(mixed $page, int $fallback = 0): Eloquent {
        $this->query['paged'] = intval($page, $fallback);
        return $this;
    }

    function toSql(): string {
        return $this->getQuery()->request;
    }

    function get(): array
    {
        $result = $this->getQuery();
        return $result->have_posts() ? $result->posts : [];
    }

    static function find(string $field = '', mixed $value = ''): Eloquent
    {
        $query = new Eloquent();
        if($query != '' && $value != '') {
            $query->where($field, $value);
        }
        return $query;
    }

    /**
     * @return WP_Query
     */
    protected function getQuery(): WP_Query
    {

        return new WP_Query($this->query);
    }
}
