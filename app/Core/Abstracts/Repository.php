<?php


namespace App\Core\Abstracts;


use App\Core\Exceptions\RepositoryException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

abstract class Repository
{
    /**
     * @var Model $model
     */
    protected $model;

    /**
     * @var Builder
     */
    protected $table;

    public function __construct()
    {
        $this->makeModel();
        $this->makeTable();
    }

    private function makeModel(): void
    {
        $model = app($this->model);

        if ( ! $model instanceof Model) {
            throw new RepositoryException(
                "Class {$this->model()} must be an instance of Illuminate\Database\Eloquent\Model"
            );
        }

        $this->model = $model;
    }

    private function makeTable(): void
    {
        $this->table = DB::table($this->table);
    }
}
