<?php

namespace RestAuth;

class Strategy
{

    /**
     * @var $request \RestApi\Request
     */
    public $request;

    /**
     * @var $model \atk4\data\Model
     */
    public $model;

    public function __construct($request = null, $model = null)
    {
        $request = $this->request;
        $strategy = $this->strategy;
    }

    /**
     * @param mixed $model
     *
     * @return Strategy
     */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * @param \RestApi\Request $request
     *
     * @return Strategy
     */
    public function setRequest($request)
    {
        $this->request = $request;
        return $this;
    }

}