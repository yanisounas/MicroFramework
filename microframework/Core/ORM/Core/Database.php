<?php

namespace MicroFramework\Core\ORM\Core;

use Exception;

class Database
{
    private readonly \PDO $db;
    private readonly Query $query;

    public function __construct(private readonly array &$opts)
    {
        $this->__connect();
        $this->query = new Query($this->db);
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return mixed
     * @throws Exception
     */
    public function __call(string $name, array $arguments): mixed
    {
        $reflect = new \ReflectionClass(Query::class);
        foreach ($reflect->getMethods() as $method)
        {
            if ($name == $method->getName())
            {
                return call_user_func_array([$this->query, $method->getName()], $arguments);
            }
        }
        throw new Exception("Call to undefined method". $reflect->getName() . "->$name()");
    }

    private function __connect(): void
    {
        $this->db = new \PDO("mysql:host=".$this->opts["DB_HOST"].";port=".$this->opts["DB_PORT"].";dbname=".$this->opts["DB_NAME"].";charset=".$this->opts["DB_CHARSET"], $this->opts["DB_USERNAME"], $this->opts["DB_PASSWORD"]);
    }

}















