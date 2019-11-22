<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>php OOP</title>
</head>
<body>

  <h1>Testing</h1>

    <?php 

    class ShopProduct
    {
      //class body

      //properties 
      private $title;
      private $producerMainName;
      private $producerFirstName;
      protected $price;
      private $discount = 0;

      //constructor
      public function __construct(string $title, string $firstName, string $mainName, float $price)
      {
        $this->title = $title;
        $this->producerFirstName = $firstName;
        $this->producerMainName = $mainName;
        $this->price = $price;
      }

      //methods
      public function getProducerFirstName()
      {
        return $this->producerFirstName;
      }

      public function getProducerMainName()
      {
        return $this->producerMainName;
      }

      public function setDiscount(float $num)
      {
        $this->discount = $num;
      }

      public function getDiscount()
      {
        return $this->discount;
      }

      public function getTitle()
      {
        return $this->title;
      }

      public function getPrice(){
        return ($this->price - $this->discount);
      }

      public function getProducer()
      {
        return $this->producerFirstName . " " . $this->producerMainName;
      }

      public function getSummaryLine()
      {
        $base = "\n {$this->title} ({$this->producerMainName}, ";
        $base.= "{$this->producerFirstName})";
        return $base;
      }

    }

    class CdProduct extends ShopProduct
    {
      private $playLength;

      public function __construct(string $title, string $firstName, string $mainName, float $price, float $playLength)
      {
        parent::__construct($title, $firstName, $mainName, $price);
        $this->playLength = $playLength;
      }

      public function getPlayLength()
      {
        return $this->playLength;
      }

      public function getPrice()
      {
        return $this->price;
      }

      public function getSummaryLine()
      {
        $base = parent::getSummaryLine();
        $base .= " => playing time - {$this->getPlayLength()}";
        return $base;
      }
    }

    class BookProduct extends ShopProduct
    {
      private $numPages;

      public function __construct(string $title, string $firstName, string $mainName, float $price, int $numPages)
      {
        parent::__construct($title, $firstName, $mainName, $price);
        $this->numPages = $numPages;
      }

      public function getNumberOfPages()
      {
        return $this->numPages;
      }

      public function getPrice()
      {
        return $this->price;
      }

      public function getSummaryLine()
      {
        $base = parent::getSummaryLine();
        $base .= " => page count - {$this->getNumberOfPages()}";
        return $base;
      }
    }

    class ShopProductWriter
    {
      public function write( ShopProduct $shopProduct)
      {
        $str = $shopProduct->getTitle() . ":" . $shopProduct->getProducer() . " (" . $shopProduct->getPrice() . "$)\n";
        print "{$str}</br>";
      }
    }

    class Wrong
    {

    }    

    $product3 = new ShopProduct('Billi Ajdol', "Mark", "Huston", 4.35);
    $writer = new ShopProductWriter;

    $product2 = new CdProduct("Ne spavaj Mala moja", "Bjelo", "Dugme", 5.64, 60.33);
    echo "<p>artist: {$product2->getSummaryLine()}</p>";

    $product1 = new BookProduct("Alehemicar", "Paulo", "Koeljo", 11.23, 69);
    print "<p>book: {$product1->getSummaryLine()}</p>";

    $writer->write($product1);
    $writer->write($product2);
    $writer->write($product3);

    $product3->setDiscount(1.4);
    $writer->write($product3);


    ?>
  
</body>
</html>

