# Dutch Stemming

## Installation
```composer require dmt-software/dutch-stemming```


## Usage

```php
use DMT\Dutch\Stemming\Stemmer;
use DMT\Dutch\Stemming\Type\Noun;
 
$stemmer = new Stemmer();
$stem = $stemmer->stem('kazen')->getStem();
// $stem equals "kaas"

$stem = $stemmer->stem('kopje', Noun::class)->getStem();
// $stem equals "kop"

```