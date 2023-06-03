<?php
require_once(dirname(__DIR__) . "/config-require.php");
?>
<?php
abstract class ItemTemplate {
    protected $idColumnName;

    protected function getRawRowArray($arrayData, $index) {
        //echo $this->idColumnName;
        $randId = time() . rand(1111, 9999);
        $slug = "slug";
        $bigImagePath = "big-image.png";
        $smallImagePath = "small-image.png";
        $audioPath = "audio.mp3";
        if(!empty($arrayData["slug"])) {
            $slug = $arrayData["slug"];
        }
        if(!empty($arrayData["big_image_path"])) {
            $bigImagePath = $arrayData["big_image_path"];
        }
        if(!empty($arrayData["small_image_path"])) {
            $smallImagePath = $arrayData["small_image_path"];
        }
        if(!empty($arrayData["audio_path"])) {
            $audioPath = $arrayData["audio_path"];
        }
        //$toDate = date("Y-m-d H:i:s", time());
        $toDate = gmdate("Y-m-d H:i:s", time());
        $createDate = $toDate;
        $modifiedDate = $toDate;
        if(!empty($arrayData["create_date"])) {
            $createDate = $arrayData["create_date"];
        }
        /* if(!empty($arrayData["modified_date"])) {
            $modifiedDate = $arrayData["modified_date"];
        } */
        $sqlArray = array(
            //"id"                => $arrayData[$this->idColumnName],
            "id"                => $randId,
            "serial"            => $index + 1,
            "bengali"           => $arrayData["bengali"],
            "english"           => $arrayData["english"],
            "slug"              => $slug,
            "big_image_path"    => $bigImagePath,
            "small_image_path"  => $smallImagePath,
            "audio_path"        => $audioPath,
            "is_enabled"        => $arrayData["is_enabled"],
            "create_date"       => $createDate,
            "modified_date"     => $modifiedDate,
        );
        $sqlArray = ArrayToSql::trimArray($sqlArray);
        return $sqlArray;
    }
    protected function generateJsonArray($arrayData) {
        return array(
            "bengali"       => $arrayData["bengali"],
            "english"       => $arrayData["english"],
            "slug"          => $arrayData["slug"],
            "big_image_path"    => $arrayData["big_image_path"],
            "small_image_path"    => $arrayData["small_image_path"],
            "audio_path"    => $arrayData["audio_path"],
        );
    }
}
?>
<?php
/*
abstract class AbstractClass
{
    // Force Extending class to define this method
    abstract protected function getValue();
    abstract protected function prefixValue($prefix);

    // Common method
    public function printOut() {
        print $this->getValue() . "\n";
    }
}

class ConcreteClass1 extends AbstractClass
{
    protected function getValue() {
        return "ConcreteClass1";
    }

    public function prefixValue($prefix) {
        return "{$prefix}ConcreteClass1";
    }
}

class ConcreteClass2 extends AbstractClass
{
    public function getValue() {
        return "ConcreteClass2";
    }

    public function prefixValue($prefix) {
        return "{$prefix}ConcreteClass2";
    }
}

$class1 = new ConcreteClass1;
$class1->printOut();
echo $class1->prefixValue('FOO_') ."\n";

$class2 = new ConcreteClass2;
$class2->printOut();
echo $class2->prefixValue('FOO_') ."\n";
*/
?>
<?php
/*
const ¶ = PHP_EOL;

// Define things a product *has* to be able to do (has to implement)
interface productInterface {
    public function doSell();
    public function doBuy();
}

// Define our default abstraction
abstract class defaultProductAbstraction implements productInterface {
    private $_bought = false;
    private $_sold = false;
    abstract public function doMore();
    public function doSell() {
        /=* the default implementation *=/
        $this->_sold = true;
        echo "defaultProductAbstraction doSell: {$this->_sold}".¶;
    }
    public function doBuy() {
        $this->_bought = true;
        echo "defaultProductAbstraction doBuy: {$this->_bought}".¶;
    }
}

class defaultProductImplementation extends defaultProductAbstraction {
    public function doMore() {
        echo "defaultProductImplementation doMore()".¶;
    }
}

class myProductImplementation extends defaultProductAbstraction {
    public function doMore() {
        echo "myProductImplementation doMore() does more!".¶;
    }
    public function doBuy() {
        echo "myProductImplementation's doBuy() and also my parent's dubai()".¶;
        parent::doBuy();
    }
}

class myProduct extends defaultProductImplementation {
    private $_bought=true;
    public function __construct() {
        var_dump($this->_bought);
    }
    public function doBuy () {
        /=* non-default doBuy implementation *=/
        $this->_bought = true;
        echo "myProduct overrides the defaultProductImplementation's doBuy() here {$this->_bought}".¶;
    }
}

class myOtherProduct extends myProductImplementation {
    public function doBuy() {
        echo "myOtherProduct overrides myProductImplementations doBuy() here but still calls parent too".¶;
        parent::doBuy();
    }
}

echo "new myProduct()".¶;
$product = new myProduct();

$product->doBuy();
$product->doSell();
$product->doMore();

echo ¶."new defaultProductImplementation()".¶;

$newProduct = new defaultProductImplementation();
$newProduct->doBuy();
$newProduct->doSell();
$newProduct->doMore();

echo ¶."new myProductImplementation".¶;
$lastProduct = new myProductImplementation();
$lastProduct->doBuy();
$lastProduct->doSell();
$lastProduct->doMore();

echo ¶."new myOtherProduct".¶;
$anotherNewProduct = new myOtherProduct();
$anotherNewProduct->doBuy();
$anotherNewProduct->doSell();
$anotherNewProduct->doMore();
*/
?>