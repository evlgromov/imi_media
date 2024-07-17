<?php

namespace App;

class PostsFilter extends QueryFilter
{
    public function title($value)
    {
        if (is_array($value)) {
            $this->builder->where(function ($query) use ($value) {
                foreach ($value as $item) {
                    $query->orWhere('title', 'like', '%' . $item . '%');
                }

                return $query;
            });

            return $this->builder;
        }

        return $this->builder->where('title', 'like', '%' . $value . '%');
    }

    public function price($value)
    {
        if (is_array($value)) {
            foreach ($value as $item) {
                $this->builder->where('price', '>=', $item);
            }

            return $this->builder;
        }

        return $this->builder->where('price', '>=', $value);
    }

    public function color($value)
    {
        if (is_array($value)) {
            foreach ($value as $item) {
                $this->builder->where('color', 'like', '%' . $item . '%');
            }

            return $this->builder;
        }

        return $this->builder->where('color', 'like', '%' . $value . '%');
    }

    public function variety($value)
    {
        if (is_array($value)) {
            foreach ($value as $item) {
                $this->builder->where('variety', 'like', '%' . $item . '%');
            }

            return $this->builder;
        }

        return $this->builder->where('variety', 'like', '%' . $value . '%');
    }

    public function category_id($value)
    {
        if (is_array($value)) {
            $this->builder->where(function ($query) use ($value) {
                foreach ($value as $item) {
                    $query->orWhere('category_id', '=', $item);
                }

                return $query;
            });

            return $this->builder;
        }

        return $this->builder->where('category_id', '=', $value);
    }
}
