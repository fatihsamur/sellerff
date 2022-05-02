<?php namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use
Tests\DuskTestCase;
use Illuminate\Support\Facades\DB;

class ExampleTest extends DuskTestCase
{
    /** * A basic browser test example. * * @return void */ public function testBasicExample()
    {
        $sku = $_SERVER['argv'][5];
        $request_id = $_SERVER['argv'][4];
        $this->browse(function (Browser $browser) use ($sku, $request_id) {
            $browser->visit('https://sellercentral.amazon.com/hz/fba/profitabilitycalculator/index?lang=en_US') ->waitFor('#link_continue >
        span > input') ->press('#link_continue > span > input') ->waitFor('#search-string') ->type('#search-string', $sku)
        ->waitFor('#a-autoid-1 > span > input') ->press('#a-autoid-1 > span > input') ->waitFor('#product-info-length')
        ->waitFor('#product-info-image', 10);
            $length = $browser->text('#product-info-length');
            $height = $browser->text('#product-info-height');
            $width =
      $browser->text('#product-info-width');
            $weight = $browser->text('#product-info-weight');
            $product_image =
      $browser->attribute('#product-info-image', 'src');
            $product_name = $browser->text('#product-info-title');
            $browser->visit('https://www.amazon.com/dp/' . $sku);
            $price = null;
            try {
                $browser->waitFor('#corePrice_feature_div > div > span > span:nth-child(2)', 6, function ($browser) {
                    //not tested section
                });
            } catch (\Exception $e) {
                $price = null;
                try {
                    $browser->waitFor('#corePrice_feature_div > div > span > span:nth-child(2)', 6, function ($browser) {
                        //not tested section
                    });
                } catch (\Exception $e) {
                }
                if (!empty($length) && !empty($height) && !empty($width) && !empty($weight)) {
                    $arr = [ 'request_id' => $request_id,
            'sku' => $sku, 'weight' => $weight, 'length' => $length, 'width' => $width, 'height' => $height, 'product_image'
            => $product_image, 'product_name' => $product_name, 'created_at' => date('Y-m-d H:i:s'),
          ];
                    if (!empty($price)) {
                        $arr['buying_price'] = $price;
                    }
                    DB::table('amazon_requests')->insert($arr);
                }
            }
            $price = $browser->text('#corePrice_feature_div > div > span > span:nth-child(2)');
            $price = str_replace(
                '$',
                '',
                $price
            );
            $price_arr = str_split($price);
            foreach ($price_arr as $key => $value) {
                if (!is_numeric($value)) {
                    $price_arr[$key] = '.';
                }
            }
            $price = implode('', $price_arr);
            if (!empty($length) && !empty($height) && !empty($width) && !empty($weight)) {
                $arr =
        [
          'request_id' => $request_id, 'sku' => $sku, 'weight' => $weight, 'length' => $length, 'width' => $width, 'height'
          => $height, 'product_image' => $product_image, 'product_name' => $product_name, 'created_at' => date('Y-m-d
          H:i:s'),
        ];
                if (!empty($price)) {
                    $arr['buying_price'] = $price;
                }
                DB::table('amazon_requests')->insert($arr);
            }
        });
    }
}
