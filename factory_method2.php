<?php

namespace RefactoringGuru\FactoryMethod\Conceptual;
abstract class DatabaseConnectionFactory
{
    // abstract public function configureConnectionHost($host, $user, $password);
    abstract public function createconnection();
    public function configureConnection($host, $user, $password)
    {
        // Call the factory method to create a Product object.
        $connection = $this->createConnection();
        // Now, use the product.
        $result = "Creator: The same creator's code has just worked with " .
        $connection->prepare().
        $connection->executeQuery().
        $connection->unload();

        return $result;
    }
}

class MySQLConnectionFactory extends DatabaseConnectionFactory
{
    public function createConnection()
    {
        return new MySQLConnection();
    }
}

class OracleDBConnectionFactory extends DatabaseConnectionFactory
{
    public function createConnection()
    {
        return new OracleDBConnection();
    }
}

class MariaDBConnectionFactory extends DatabaseConnectionFactory
{
    public function createConnection()
    {
        return new MariaDBConnection();
    }
}

class CassandraDBConnectionFactory extends DatabaseConnectionFactory
{
    public function createConnection()
    {
        return new CassandraDBConnection();
    }
}

class PostgreSQLDBConnectionFactory extends DatabaseConnectionFactory
{
    public function createConnection()
    {
        return new PostgreDBConnection();
    }
}

class SQLServerDBConnectionFactory extends DatabaseConnectionFactory
{
    public function createConnection()
    {
        return new SQLServerDBConnection();
    }
}

class IngresDBConnectionFactory extends DatabaseConnectionFactory
{
    public function createConnection()
    {
        return new IngresDBConnection();
    }
}

 

interface DBConnection
{
    public function deliver();
    public function load();
    public function unload();
}

/**
 * Concrete Products provide various implementations of the Product interface.
 */
class MySQLConnection implements DBConnection
{
    public function prepare()
    {
        return "{Successful preparation}";
    }
    public function executeQuery()
    {
        return "{Successful execution}";
    }
    public function unload()
    {
        return "{Successful unload}";
    }
}

class SQLServerConnection implements DBConnection
{
    public function prepare()
    {
        return "{Successful preparation}";
    }
    public function executeQuery()
    {
        return "{Successful execution}";
    }
    public function unload()
    {
        return "{Successful unload}";
    }
}

class MariaDBConnection implements DBConnection
{
    public function prepare()
    {
        return "{Successful preparation}";
    }
    public function executeQuery()
    {
        return "{Successful execution}";
    }
    public function unload()
    {
        return "{Successful unload}";
    }
}

class OracleDBConnection implements DBConnection
{
       public function prepare()
    {
        return "{Successful preparation}";
    }
    public function executeQuery()
    {
        return "{Successful execution}";
    }
    public function unload()
    {
        return "{Successful unload}";
    }
}

class IngresDBConnection implements DBConnection
{
      public function prepare()
    {
        return "{Successful preparation}";
    }
    public function executeQuery()
    {
        return "{Successful execution}";
    }
    public function unload()
    {
        return "{Successful unload}";
    }
}

class PostgreSQLConnection implements DBConnection
{
      public function prepare()
    {
        return "{Successful preparation}";
    }
    public function executeQuery()
    {
        return "{Successful execution}";
    }
    public function unload()
    {
        return "{Successful unload}";
    }
}

class CassandraDBConnection implements DBConnection
{
    public function prepare()
    {
        return "{Successful preparation}";
    }
    public function executeQuery()
    {
        return "{Successful execution}";
    }
    public function unload()
    {
        return "{Successful unload}";
    }

function clientCode(DatabaseConnectionFactory $connection)
{
    // ...
    echo "Working.\n"
        . $connection->configureConnection($host, $user, $password);
    // ...
}
