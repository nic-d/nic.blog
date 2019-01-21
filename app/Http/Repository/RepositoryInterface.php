<?php
/**
 * Created by PhpStorm.
 * User: Nic
 * Date: 21/01/2019
 * Time: 15:52
 */

namespace App\Http\Repository;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface RepositoryInterface
 * @package App\Http\Repository
 */
interface RepositoryInterface
{
    /**
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * @param array $columns
     * @return mixed
     */
    public function findAll(array $columns = ['*']);

    /**
     * @param string $column
     * @param $value
     * @param array $orderBy
     * @return mixed
     */
    public function findBy(string $column, $value, array $orderBy = []);

    /**
     * @param string $column
     * @param $value
     * @param array $orderBy
     * @return mixed
     */
    public function findOneBy(string $column, $value, array $orderBy = []);

    /**
     * @param array $criteria
     * @return int
     */
    public function count(array $criteria): int;

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes = []);

    /**
     * @param null|int $id
     * @param array $attributes
     * @return mixed
     */
    public function createOrUpdate($id = null, array $attributes = []);

    /**
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, array $attributes = []);

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * @param Model $model
     * @return mixed
     */
    public function setModel($model);

    /**
     * @return Model
     */
    public function getModel();
}