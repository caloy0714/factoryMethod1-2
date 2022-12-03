<?php
abstract class Logistics
{
    abstract public function CreateTransport();

    public function PlanDelivery(): string
    {
        // Call the factory method to create a Product object.
        $logis = $this->factoryMethod();
        // Now, use the product.
        $result = "Creator: The same creator's code has just worked with " .
            $logis->operation();

        return $result;
    }
}

class RoadLogistics extends Logistics
{
    public function CreateTransport()
    {
        return new Truck();
    }

}

class SeaLogistics extends Logistics
{
    public function CreateTransport()
    {
        return new Boat();
    }

}

interface Transport 
{
    public function deliver();
    public function load();
    public function unload();
}

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


function clientCode(Logistics $creator)
{
    // ...
    echo "Client Only\n"
        . $creator->PlanDelivery();
    // ...
}

echo "Launch Truck\n";
clientCode(new truck());
echo "\n\n";

echo "Launch Boat\n";
clientCode(new boat());
