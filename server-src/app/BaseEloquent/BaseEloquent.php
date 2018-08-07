<?php

/**
 * File Base Eloquent
 * Define method hanlde eloquent
 * @author TriHNM <minhtri191195@gmail.com>
 * @package App\BaseEloquent
 * @date 2018-08-06
 */

namespace App\BaseEloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use \Exception;
use \DB;

abstract class BaseEloquent implements BaseInterface
{
    // Property instantce for model
    protected $_model;

    // Property instantce for DB
    protected $_db;

    // Property app instance for container
    protected $app;

    public function __construct()
    {
        $this->app = new App();
        $this->makeModel();
    }

    /**
     * Function get model path
     *
     * @abstract
     * @return string
     */
    abstract public function model();

    /**
     * Function get table name
     *
     * @return string
     */
    abstract public function tableName();

    /**
     * Function make ORM
     *
     * @throws ModelNotFoundException
     * @return Illuminate\Database\Eloquent\Model
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model) {
            throw new ModelNotFoundException('Error Make Model');
        }

        return $this->_model = $model;
    }

    /**
     * Function make query builder
     *
     * @throws Exception
     * @return QueryBuilder
     */
    public function makeDB()
    {
        try {
            $table = $this->tableName();

            return $this->_db = DB::table($table);
        } catch (Exception $e) {
            throw new Exception('Table Not Found');
        }
    }

    /**
     * Function cast from ORM to query builder
     *
     * @return void
     */
    public function queryBuilder()
    {
        if (empty($this->_db)) {
            $this->_db = $this->makeDB();
        }

        $this->_model = $this->_db;

        return $this;
    }

    /**
     * Function where condition
     *
     * @param string|array|Closure $column
     * @param mixed $operator
     * @param mixed $value
     * @param string $boolean
     * @return $this
     */
    public function where($column, $operator = null, $value = null, string $boolean = 'and')
    {
        $this->_model = $this->_model->where($column, $operator, $value, $boolean);

        return $this;
    }

    /**
     * Undocumented function
     *
     * @param integer $id
     * @param array $column
     * @return Model
     */
    public function findOrFail(int $id, array $columns = ['*'])
    {
        $model = $this->_model->findOrFail($id, $columns);

        $this->makeModel();

        return $model;
    }

    /**
     * Undocumented function
     *
     * @param integer $id
     * @param array $column
     * @return Model
     */
    public function find(int $id, array $columns = ['*'])
    {
        $data = $this->_db->find($id, $columns);

        $this->makeDB();

        return $data;
    }

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
    ) {
        $data = $this->_model->paginate($perPage, $columns, $pageName, $page);

        $this->makeModel();
        $this->makeDB();

        return $data;
    }

    /**
     * Function get
     *
     * @param array $columns
     * @return Collection
     */
    public function get(array $columns = ['*'])
    {
        $data = $this->_model->get($columns);

        $this->makeModel();
        $this->makeDB();

        return $data;
    }
}
