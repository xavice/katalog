<?php

namespace App;

class Catalog
{
    public $results;
    protected $allowed_sort;
    protected $allowed_order;
    protected $model;

    public function __construct()
    {
        $this->model = new Book();
        $this->results = [];
        $this->allowed_sort = [
            'title',
            'year',
            'rating',
        ];
        $this->allowed_order = [
            'asc',
            'desc',
        ];
    }

    public function getBooksResults($pagination)
    {
        if (!$this->results) {
            if ($pagination <= 0) {
                $pagination = 20;
            }

            if (request()->has('search') && request()->search) {
                $this->resolveFilter(request()->search);
            }

            if (request()->has('sort') && request()->has('order') && request()->sort && request()->order
                && in_array(request()->sort, $this->allowed_sort) && in_array(request()->order, $this->allowed_order)) {
                $this->resolveSorting(request()->sort, request()->order);
            }
            return $this->results = $this->model->paginate($pagination);
        } else {
            return $this->results;
        }
    }

    protected function resolveFilter($search)
    {
        return $this->model = $this->model->where('title', 'like', '%' . $search . '%')
            ->orWhere('author', 'like', '%' . $search . '%')
            ->orWhere('year', 'like', '%' . $search . '%')
            ->orWhere('publisher', 'like', '%' . $search . '%');
    }

    protected function resolveSorting($sort, $order)
    {
        return $this->model = $this->model->orderBy($sort, $order);
    }

}
