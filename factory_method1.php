<?php

namespace RefactoringGuru\FactoryMethod\Conceptual;

/**
 * The Creator class declares the factory method that is supposed to return an
 * object of a Product class. The Creator's subclasses usually provide the
 * implementation of this method.
 */
abstract class Logistics
{
    /**
     * Note that the Creator may also provide some default implementation of the
     * factory method.
     */
    abstract public function PlanDelivery();
    abstract public function CreateTransport();

    /**
     * Also note that, despite its name, the Creator's primary responsibility is
     * not creating products. Usually, it contains some core business logic that
     * relies on Product objects, returned by the factory method. Subclasses can
     * indirectly change that business logic by overriding the factory method
     * and returning a different type of product from it.
     */
    public function someOperation(): string
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
class RoadLogistics extends Logistics
{
    public function CreateTransport()
    {
        return new Truck();
    }

    public function PlanDelivery()
    {
        return "plan";
    }

    
}

class SeaLogistics extends Logistics
{
    public function CreateTransport()
    {
        return new Boat();
    }

    public function PlanDelivery()
    {
        return "plan";
    }
}

/**
 * The Product interface declares the operations that all concrete products must
 * implement.
 */
interface Transport 
{
    public function deliver();
    public function load();
    public function uload();
}

/**
 * Concrete Products provide various implementations of the Product interface.
 */
class Truck implements Transport
{
    public function deliver()
    {
        return "Successful delivery";
    }

    public function load()
    {
        return "Successfully loaded";
    }

    public function unload()
    {
        return "Successfully unloaded";
    }
}

class Sea implements Transport
{
    public function deliver()
    {
        return "Successful delivery";
    }

    public function load()
    {
        return "Successfully loaded";
    }

    public function unload()
    {
        return "Successfully unloaded";
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
// echo "App: Launched with the ConcreteCreator1.\n";
// clientCode(new ConcreteCreator1());
// echo "\n\n";

// echo "App: Launched with the ConcreteCreator2.\n";
// clientCode(new ConcreteCreator2());