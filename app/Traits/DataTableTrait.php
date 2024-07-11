<?php

namespace App\Traits;

trait DataTableTrait
{
    public function scopeForDatatables($query, $params)
    {
        //Insert Search Parameters
        if (isset($params['search']) && isset($params['search']['value']) && $params['search']['value'] != null && $params['search']['value'] != "") {
            $query->search($params['search']['value']);
        }

        $query->offset($params['start'])->limit($params['length']);
        //$columns = $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
        $orderByColumn = $params['columns'][$params['order'][0]['column']]['name'];
        if (
            isset($params['order']) &&
            isset($params['order'][0]) &&
            isset($params['order'][0]['column']) &&
            isset($params['columns']) &&
            isset($params['columns']) &&
            isset($params['columns'][$params['order'][0]['column']]) &&
            isset($params['columns'][$params['order'][0]['column']]['name']) //&&
            //in_array ($orderByColumn, $columns)
        ) {
            $query->orderBy($params['columns'][$params['order'][0]['column']]['name'], $params['order'][0]['dir']);
        }
    }

}
