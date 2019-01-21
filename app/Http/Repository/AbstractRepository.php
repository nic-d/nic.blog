<?php
/**
 * Created by PhpStorm.
 * User: Nic
 * Date: 21/01/2019
 * Time: 16:13
 */

namespace App\Http\Repository;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AbstractRepository
 * @package App\Http\Repository
 */
abstract class AbstractRepository implements RepositoryInterface
{
    /** @var Model $model */
    private $model;

    /**
     * AbstractRepository constructor.
     * @param null|Model $model
     */
    public function __construct($model = null)
    {
        if (!is_null($model)) {
            if (!$model instanceof Model && !is_subclass_of($model, Model::class)) {
                throw new \InvalidArgumentException(sprintf(
                    'Instance of %s expected, got %s',
                    'Illuminate\Database\Eloquent\Model',
                    $model
                ));
            }

            $this->model = $model;
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->model::where('id', $id)->first();
    }

    /**
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection|Model[]|mixed
     */
    public function findAll(array $columns = ['*'])
    {
        return $this->model::all($columns);
    }

    /**
     * @param string $column
     * @param $value
     * @param array $orderBy
     * @return mixed
     */
    public function findBy(string $column, $value, array $orderBy = [])
    {
        $statement = $this->model::where($column, $value);

        if (empty($orderBy)) {
            return $statement->get();
        }

        return $statement
            ->orderBy(...$orderBy)
            ->get();
    }

    /**
     * @param string $column
     * @param $value
     * @param array $orderBy
     * @return mixed
     */
    public function findOneBy(string $column, $value, array $orderBy = [])
    {
        $statement = $this->model::where($column, $value);

        if (empty($orderBy)) {
            return $statement->first();
        }

        return $statement
            ->orderBy(...$orderBy)
            ->first();
    }

    /**
     * @param array $criteria
     * @return int
     */
    public function count(array $criteria = []): int
    {
        if (!empty($criteria)) {
            return $this->model::where(...$criteria)->count();
        }

        return $this->model::count();
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes = [])
    {
        return $this->model::create($attributes)->save();
    }

    /**
     * @param null|int $id
     * @param array $attributes
     * @return mixed
     */
    public function createOrUpdate($id = null, array $attributes = [])
    {
        /** @var Model $item */
        $item = $this->find($id);

        // If the model exists with this $id, let's just update
        if (!is_null($item)) {
            $this->update($id, $attributes);
        }

        return $this->create($attributes);
    }

    /**
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, array $attributes = [])
    {
        return $this->find($id)->update($attributes);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->find($id)->delete();
    }

    /**
     * @param Model $model
     * @return mixed|void
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Allows you to call any method available in the $model instance.
     *
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        return call_user_func_array([$this->model, $name], $arguments);
    }
}