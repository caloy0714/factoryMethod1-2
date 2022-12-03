<?php

namespace RefactoringGuru\FactoryMethod\Conceptual;
abstract class DatabaseConnectionFactory
{
    // abstract public function configureConnectionHost($host, $user, $password);
    abstract public function setConnection();
    public function configureConnectionHost($host, $user, $password): string
    {
        // Call the factory method to create a Product object.
        $product = $this->factoryMethod();
        // Now, use the product.
        $result = "Creator: The same creator's code has just worked with " .
            $product->operation();

        return $result;
    }
}

/**
 * Concrete Creators override the factory method in order to change the
 * resulting product's type.
 */
class MySQLConnectionFactory extends DatabaseConnectionFactory
{
    public function setConnection()
    {
        return new MySQLConnection();
    }
}

class OracleDBConnectionFactory extends DatabaseConnectionFactory
{
    public function setConnection()
    {
        return new OracleDBConnection();
    }
}

class MariaDBConnectionFactory extends DatabaseConnectionFactory
{
    public function setConnection()
    {
        return new MariaDBConnection();
    }
}

class CassandraDBConnectionFactory extends DatabaseConnectionFactory
{
    public function setConnection()
    {
        return new CassandraDBConnection();
    }
}

class PostgreSQLDBConnectionFactory extends DatabaseConnectionFactory
{
    public function setConnection()
    {
        return new PostgreDBConnection();
    }
}

class SQLServerDBConnectionFactory extends DatabaseConnectionFactory
{
    public function setConnection()
    {
        return new SQLServerDBConnection();
    }
}

class IngresDBConnectionFactory extends DatabaseConnectionFactory
{
    public function setConnection()
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
    public function operation(): string
    {
        return "{Result of the ConcreteProduct1}";
    }
}

class ConcreteProduct2 implements Product
{
    public function operation(): string
    {
        return "{Result of the ConcreteProduct2}";
    }
}

/**
 * The client code works with an instance of a concrete creator, albeit through
 * its base interface. As long as the client keeps working with the creator via
 * the base interface, you can pass it any creator's subclass.
 */
function clientCode(Creator $creator)
{
    // ...
    echo "Client: I'm not aware of the creator's class, but it still works.\n"
        . $creator->someOperation();
    // ...
}

/**
 * The Application picks a creator's type depending on the configuration or
 * environment.
 */
echo "App: Launched with the ConcreteCreator1.\n";
clientCode(new ConcreteCreator1());
echo "\n\n";

echo "App: Launched with the ConcreteCreator2.\n";
clientCode(new ConcreteCreator2());
