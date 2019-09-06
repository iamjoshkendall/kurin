Kurīn
--

A simple library to load and clean your CSV file into PHP arrays with named keys. While created specifcally for use with Laravel Database Seeders, it can be used any place you want to convert a CSV file to a PHP array with named keys.


### Installation

Kurīn can be installed with composer.

`composer require iamjoshkendall/kurin`


### Usage

Once Kurīn has been added to Laravel you can use it anywhere you want to convert a CSV file to a PHP array.


##### Basic Example

```php
use IAmJoshKendall\Kurin;

$results = Kurin::fromCSV('data/example.csv', ['id', 'name']);
```


##### Seeder Example

```php
use Illuminate\Database\Seeder;
use IAmJoshKendall\Kurin;

class ExampleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $examples = Kurin::fromCSV(storage_path('app/example.csv'), ['id', 'name', 'slug', 'description']);

        DB::table('examples')->insert($examples);
    }
}
```


### Parameters

Kurīn expects two parameters, the path to the CSV file and the array containing the desired key strings. The keys need to be in the order you want the CSV matched to.

Kurīn however supports a third optional parameter, an array of strings that will be appended to the array as keys after the CSV fields and have their value set to [Carbon](http:/github.com/briannesbitt/Carbon) timestamps.

##### Carbon Example

```php
use IAmJoshKendall\Kurin;

$results = Kurin::fromCSV('data/example.csv', ['id', 'name'], ['created_at', 'updated_at']);
```
