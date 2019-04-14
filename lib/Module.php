<?php

namespace RestAuth;

class Module
{

    private $strategies = [
        'base_auth' => \RestAuth\Strategies\BaseAuth::class
    ];

    public $strategy;

    public $req;

    public function __construct($strategy,$req)
    {
        $this->strategy = $strategy;
        $this->req = $req;
        $this->validate();
    }

    public function validate()
    {
        if(!is_a($this->req, "\RestApi\Request")){
            return new Error('The module supports only \RestApi\Request, "' . get_class($this->req) . '" is not integrated.');
        }
    }

    public function load()
    {
        if(in_array($this->strategy,$this->strategies)){
            return new $this->strategies[$strategy]($this->req);
        }
        return new Error('Strategy "' . $this->strategy . '" is unavailable.');
    }
}