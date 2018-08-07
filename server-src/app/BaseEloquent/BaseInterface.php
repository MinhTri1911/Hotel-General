<?php

/**
 * File Base Eloquent interface
 * Define method must be implement when using
 * @author TriHNM <minhtri191195@gmail.com>
 * @package App\BaseEloquent
 * @date 2018-08-06
 */

namespace App\BaseEloquent;

interface BaseInterface
{
    /**
     * Function make ORM
     *
     * @throws ModelNotFoundException
     * @return Illuminate\Database\Eloquent\Model
     */
    public function makeModel();

    /**
     * Function make query builder
     *
     * @throws Exception
     * @return QueryBuilder
     */
    public function makeDB();

    /**
     * Function where condition
     *
     * @param string|array|Closure $column
     * @param mixed $operator
     * @param mixed $value
     * @param string $boolean
     * @return $this
     */
    public function where($column, $operator = null, $value = null, string $boolean = 'and');

    /**
     * Undocumented function
     *
     * @param integer $id
     * @param array $column
     * @return Model
     */
    public function findOrFail(int $id, array $columns = ['*']);

    /**
     * Undocumented function
     *
     * @param integer $id
     * @param array $column
     * @return Model
     */
    public function find(int $id, array $columns = ['*']);

    /**
     * Function paginate
     *
     * @param integer $perPage
     * @param array $columns
     * @param string $pageName
     * @param integer|null $page
     * @return LengthAwarePaginator
     */
    public function paginate(
        int $perPage = 15,
        array $columns = ['*'],
        string $pageName = 'page',
        int $page = null
    );

    /**
     * Function get
     *
     * @param array $columns
     * @return Collection
     */
    public function get(array $columns = ['*']);
}
