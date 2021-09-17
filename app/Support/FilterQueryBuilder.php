<?php

namespace App\Support;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class FilterQueryBuilder
{
    protected $model;
    protected $table;

    public function apply($query, $data)
    {
        $this->model = $query->getModel();
        $this->table = $this->model->getTable();

        
        if (isset($data['f'])) {
            foreach ($data['f'] as &$filter) {
                
                if(property_exists($this->model,'translatedAttributes')) {
                    if (in_array($filter['column'],$this->model->translatedAttributes)) {
                        $filter['operator'] = 'containsTranslation';                       
                    }
                }
                $filter['match'] = $data['filter_match'] ?? 'and';
                $this->makeFilter($query, $filter);
            }
        }

        $this->makeOrder($query, $data);

        return $query;
    }

    public function contains($filter, $query)
    {
        return $query->where($filter['column'], 'like', '%' . $filter['query_1'] . '%', $filter['match']);
    }

    public function containsTranslation($filter, $query)
    {

        if ($filter['match']=='or') {
            return $query->orWhereTranslationLike($filter['column'], '%' . $filter['query_1'] . '%');
        } 
        return $query->whereTranslationLike($filter['column'], '%' . $filter['query_1'] . '%');
    }

    protected function makeOrder($query, $data)
    {
        if ($this->isNestedColumn($data['order_column'])) {
            [$relationship, $column] = explode('.', $data['order_column']);
            $callable                = Str::camel($relationship);
            $belongs                 = $this->model->{$callable}(
            );
            $relatedModel = $belongs->getModel();
            $relatedTable = $relatedModel->getTable();
            $as           = "prefix_{$relatedTable}";

            if (!$belongs instanceof BelongsTo) {
                return;
            }

            $query->leftJoin(
                "{$relatedTable} as {$as}",
                "{$as}.id",
                '=',
                "{$this->table}.{$relationship}_id"
            );

            $data['order_column'] = "{$as}.{$column}";
        }

        $query
            ->orderBy($data['order_column'], $data['order_direction'])
            ->select("{$this->table}.*");
    }

    protected function makeFilter($query, $filter)
    {
        if ($this->isNestedColumn($filter['column'])) {
            [$relation, $filter['column']] = explode('.', $filter['column']);
            $callable                      = Str::camel($relation);
            $filter['match']               = 'and';

            $query->orWhereHas(Str::camel($callable), function ($q) use ($filter) {
                $this->{Str::camel($filter['operator'])}(
                    $filter,
                    $q
                );
            });
        } else {
            if(!property_exists($this->model,'translatedAttributes')) {
            $filter['column'] = "{$this->table}.{$filter['column']}";
            }
            $this->{Str::camel($filter['operator'])}(
                $filter,
                $query
            );
        }
    }

    protected function isNestedColumn($column)
    {
        return strpos($column, '.') !== false;
    }
}
