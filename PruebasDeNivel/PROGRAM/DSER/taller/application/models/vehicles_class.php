<?php


class vehicles_class extends CI_MODEL{

protected $plate;
protected $brand;
protected $model;
protected $color;
protected $objetcustomer;


/**
 * Get the value of plate
 */ 
public function getPlate()
{
return $this->plate;
}

/**
 * Set the value of plate
 *
 * @return  self
 */ 
public function setPlate($plate)
{
$this->plate = $plate;

return $this;
}

/**
 * Get the value of brand
 */ 
public function getBrand()
{
return $this->brand;
}

/**
 * Set the value of brand
 *
 * @return  self
 */ 
public function setBrand($brand)
{
$this->brand = $brand;

return $this;
}

/**
 * Get the value of model
 */ 
public function getModel()
{
return $this->model;
}

/**
 * Set the value of model
 *
 * @return  self
 */ 
public function setModel($model)
{
$this->model = $model;

return $this;
}

/**
 * Get the value of color
 */ 
public function getColor()
{
return $this->color;
}

/**
 * Set the value of color
 *
 * @return  self
 */ 
public function setColor($color)
{
$this->color = $color;

return $this;
}

/**
 * Get the value of customer
 */ 
public function getObjetcustomer()
{
return $this->objetcustomer;
}

/**
 * Set the value of customer
 *
 * @return  self
 */ 
public function setObjetcustomer($objetcustomer)
{
$this->objetcustomer = $objetcustomer;

return $this;
}
}