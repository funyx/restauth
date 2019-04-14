<?php

namespace RestAuth\Strategies;

class BaseAuth extends \RestAuth\Strategy
{

    public $request;

    public $callback;

    private $username;

    private $password;

    public function __construct($request = null, $model = null)
    {
        parent::__construct($request, $model);
    }

    public function run(){
        $this->validate();
    }

    public function validate(){
        if(!$request->getHeader()){
            return \RestAuth\Error('Username must be a string.');
        }

        if(!is_string($this->password)){
            return \RestAuth\Error('Password must be a string.');
        }

        if(!is_callable($this->callback)){
            return \RestAuth\Error('The callback must be a function.');
        }
    }

    /**
     * @param mixed $username
     *
     * @return BaseAuth
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @param mixed $password
     *
     * @return BaseAuth
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @param mixed $callback
     *
     * @return BaseAuth
     */
    public function setCallback($callback)
    {
        $this->callback = $callback;
        return $this;
    }

}