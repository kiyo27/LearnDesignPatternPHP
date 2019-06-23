<?php

/**
 * Subject Interface
 */
interface Subject {
  public function registerObserver(Observer $o);
  public function removeObserver(Observer $o);
  public function notifyObservers();
}

/**
 * Observer Interface
 */
interface Observer {
  public function update(float $temp, float $humidity, float $pressure);
}

/**
 * DisplayElement Interface
 */
interface DisplayElement {
  public function display();
}

/**
 * WeatherData Class
 */
class WeatherData implements Subject {
  private $observers;
  private $temperature;
  private $humidity;
  private $pressure;

  public function __construct() {
    $this->observers = array();
  }

  public function registerObserver(Observer $o) {
    $this->observers[] = $o;
  }

  public function removeObserver(Observer $o) {
    if (in_array($o, $this->observers)) {
      array_splice($this->observers, array_search($o, $this->observers));
    }
  }

  public function notifyObservers() {
    foreach ($this->observers as $observer) {
      $observer->update($this->temperature, $this->humidity, $this->pressure);
    }
  }

  public function measurementsChanged() {
    $this->notifyObservers();
  }

  public function setMeasurements($temperature, $humidity, $pressure) {
    $this->temperature = $temperature;
    $this->humidity = $humidity;
    $this->pressure = $pressure;
    $this->measurementsChanged();
  }
}

/**
 * CurrentConditionsDislplay Class
 */
class CurrentConditionsDisplay implements Observer, DisplayElement {
  private $temperature;
  private $humidity;
  private $weatherData;

  public function __construct(Subject $weatherData) {
    $this->weatherData = $weatherData;
    $weatherData->registerObserver($this);
  }

  public function update(float $temperature, float $humidity, float $pressure) {
    $this->temperature = $temperature;
    $this->humidity = $humidity;
    $this->display();
  }

  public function display() {
    echo "現在の気象状況: 温度" . $this->temperature . "度 湿度" . $this->humidity . "%";
  }
}

$weatherData = new WeatherData();
$currentDisplay = new CurrentConditionsDisplay($weatherData);

$weatherData->setMeasurements(27, 65, 30.4);