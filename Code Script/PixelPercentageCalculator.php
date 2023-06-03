<?php
$pixelPercent = new PixelPercentageCalculator();

$pixelPercent->setStartHour(0)
->setStartMinute(4.23)
->setStartSecond(0);

$pixelPercent->setEndHour(0)
->setEndMinute(10)
->setEndSecond(0);

$pixelPercent->setPixelWidth(500);

$pixelPercent->calculate();

$finalPixelWidth = $pixelPercent->getPixel();
$finalPercentWidth = $pixelPercent->getPercentage();

echo "\n";
echo "\n";
echo "|" . $finalPixelWidth . "| pixel width";
echo "\n";
echo "|" . $finalPercentWidth . "| Percent width";
echo "\n";
echo "\n";
?>
<?php
class PixelPercentageCalculator {
    private $startHour = 0;
    private $startMinute = 0;
    private $startSecond = 0;
    
    private $endHour = 0;
    private $endMinute = 0;
    private $endSecond = 0;
    
    //private $totalStartHour = 0;
    //private $totalStartMinute = 0;
    private $totalStartSecond = 0;
    
    //private $totalEndHour = 0;
    //private $totalEndMinute = 0;
    private $totalEndSecond = 0;
    
    private $pixelWidth = 0;
    private $finalPixelWidth = 0;
    private $finalPercentWidth = 0;
    
    public function setStartHour($hour) {
        $this->startHour = $hour;
        return $this;
    }
    public function setStartMinute($minute) {
        $this->startMinute = $minute;
        return $this;
    }
    public function setStartSecond($second) {
        $this->startSecond = $second;
        return $this;
    }
    
    public function setEndHour($hour) {
        $this->endHour = $hour;
        return $this;
    }
    public function setEndMinute($minute) {
        $this->endMinute = $minute;
        return $this;
    }
    public function setEndSecond($second) {
        $this->endSecond = $second;
        return $this;
    }
    
    public function setPixelWidth($pixelWidth) {
        $this->pixelWidth = $pixelWidth;
        return $this;
    }
    
    public function calculate() {
        $totalStartHour = 60 * 60 * $this->startHour;
        $totalStartMinute = 60 * $this->startMinute;
        $this->totalStartSecond = $totalStartHour + $totalStartMinute + $this->startSecond;
        
        $totalEndHour = 60 * 60 * $this->endHour;
        $totalEndMinute = 60 * $this->endMinute;
        $this->totalEndSecond = $totalEndHour + $totalEndMinute + $this->endSecond;
        
        $this->onCalculatePixel();
        $this->onCalculatePercentage();
    }
    
    private function onCalculatePixel() {
        $desirePixel = ($this->pixelWidth * $this->totalStartSecond) / $this->totalEndSecond;
        $this->finalPixelWidth = $desirePixel;
    }
    
    private function onCalculatePercentage() {
        $desirePercent = (100 * $this->finalPixelWidth) / $this->pixelWidth;
        $this->finalPercentWidth = $desirePercent;
    }
    
    public function getPixel() {
        //return $this->finalPixelWidth;
        return round($this->finalPixelWidth, 2);
    }
    public function getPercentage() {
        //return $this->finalPercentWidth;
        return round($this->finalPercentWidth, 2);
    }
}
?>
<?php
/*
$targetHour = 0;
$targetMinute = 1;
$targetSecond = 0;

$endHour = 0;
$endMinute = 10;
$endSecond = 0;

$pixelWidth = 500;

$totalSecond = $endHour * 60 * 60 + $endMinute * 60 + $endSecond;
$targetSecond = $targetHour * 60 * 60 + $targetMinute * 60 + $targetSecond;
$desirePixel = ($pixelWidth * $targetSecond) / $totalSecond;

echo "|" . floor($desirePixel) . "| px of " . $pixelWidth . "px";
*/
?>