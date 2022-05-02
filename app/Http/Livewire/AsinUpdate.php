<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Country;
use App\Marketplace;
use App\AmazonRequest;
use App\Order;
use App\UserActivity;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Str;

class AsinUpdate extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    public $orderId;

    public $currentStep = 1;
    public $selectedCountry;
    public $selectedMarketplace;
    public $countries;
    public $marketplaces;
    public $inputs = [];
    public $i = 0;
    public $countriesOpen;
    public $marketPlacesOpen;
    public $order = [];
    public $isFirstFetch = true;
    public $isAddClicked = false;
    public $isOrderCreated = false;
    public $uploadedLabels = false;
    public $lastFetchError = [];
    public $buyerOrderInputs = [];
    public $buyerOrderIndex = 0;
    public $orderModel;
    public $boxsystem;
    public $backUsed;
    public $manualInformation;
    public $order_box_instructions;
    public $prodnotfoundid;
    public $withoutPayment = false;
    public $deletedSkus;
    protected $listeners = [
      'ItemSelected' => 'closeSelector',
      'skuFormChanged' => 'getProductData',
      'customerLeaving' => 'saveOrder',

    ];

    public function firstSubmitRules()
    {
        return [
        'selectedMarketplace' => 'required',
        'order.order_details.product.*.sku' => 'required|string|min:10|max:10',
        'order.order_details.product.*.width' => 'required|numeric|min:0.01',
        'order.order_details.product.*.height' => 'required|numeric|min:0.01',
        'order.order_details.product.*.length' => 'required|numeric|min:0.01',
        'order.order_details.product.*.weight' => 'required|numeric|min:0.01',
        'order.order_details.product.*.buying_price' => 'required|numeric|min:0.01',
        'order.order_details.product.*.quantity' => 'required|numeric|min:1',
      ];
    }


    protected $firstSubmitMessages = [
      'selectedMarketplace.required' => 'Bir Market seçiniz',
      'selectedCountry.required' => 'Bir Ülke seçiniz',
      'order.order_details.product.*.sku.required' => 'Lütfen Bir SKU giriniz',
      'order.order_details.product.*.sku.string' => 'Lütfen Geçerli Bir SKU Giriniz',
      'order.order_details.product.*.sku.max' => 'SKU en fazla 10 karakter olabilir',
      'order.order_details.product.*.sku.min' => 'SKU 10 karakter olmalıdır',
      'order.order_details.product.*.width.required' => 'Lütfen bir genişlik giriniz',
      'order.order_details.product.*.width.numeric' => 'Lütfen geçerli bir genişlik giriniz',
      'order.order_details.product.*.height.required' => 'Lütfen bir yükseklik giriniz',
      'order.order_details.product.*.height.numeric' => 'Lütfen geçerli bir yükseklik giriniz',
      'order.order_details.product.*.length.required' => 'Lütfen bir uzunluk giriniz',
      'order.order_details.product.*.length.numeric' => 'Lütfen geçerli bir uzunluk giriniz',
      'order.order_details.product.*.weight.required' => 'Lütfen bir ağırlık giriniz',
      'order.order_details.product.*.weight.numeric' => 'Lütfen geçerli bir ağırlık giriniz',
      'order.order_details.product.*.buying_price.required' => 'Lütfen bir fiyat giriniz',
      'order.order_details.product.*.buying_price.numeric' => 'Lütfen geçerli bir fiyat giriniz',
      'order.order_details.product.*.quantity.required' => 'Lütfen ürün adedi giriniz',
      'order.order_details.product.*.quantity.numeric' => 'Lütfen geçerli ürün adedi giriniz',
    ];

    public function thirdSubmitRules()
    {
        return [
        'order.order_details.labels' => 'required|array|min:1',
        'order.order_details.labels.*' => 'required|mimes:pdf|max:10000',
        'order.order_details.product.*.fnsku' => 'required|string',
      ];
    }

    public $thirdSubmitMessages = [
      'order.order_details.labels.required' => 'Lütfen bir etiket ekleyiniz',
      'order.order_details.labels.array' => 'Lütfen etiketleri ekleyiniz',
      'order.order_details.labels.min' => 'Lütfen en az bir etiket ekleyiniz',
      'order.order_details.labels.*.required' => 'Lütfen bir etiket giriniz',
      'order.order_details.labels.*.pdf' => 'Lütfen geçerli bir etiket yükleyiniz',
      'order.order_details.labels.*.max' => 'Etiket en fazla 10MB olabilir',
      'order.order_details.product.*.fnsku.required' => 'Lütfen bir FNSKU giriniz',
      'order.order_details.product.*.fnsku.string' => 'Lütfen geçerli bir FNSKU giriniz',
    ];

    public function mount($id)
    {
        $this->countries = Country::all();
        $this->marketplaces = Marketplace::all();
        $this->deletedSkus = [];
        $this->orderId = $id;
        $this->orderModel = Order::find($id);

        //$this->order = Order::find($id)->toArray();
        $order_items = $this->orderModel->order_items()->get()->toArray();

        foreach ($order_items as $key => $order_item) {
            $this->order['order_details']['product'][] = [
              'sku' => $order_item['unique_identifier'],
              'width' => $order_item['width'],
              'height' => $order_item['height'],
              'length' => $order_item['length'],
              'weight' => $order_item['weight'],
              'buying_price' => $order_item['buying_price'],
              'quantity' => $order_item['quantity'],
              'product_image' => $order_item['product_image'],
              'product_name' => $order_item['product_name'],
              'source' => 'db'

            ];
            $market = Marketplace::find($order_item['service_marketplace_id'])->first();

            $country = Country::find($this->orderModel->service_country_id);

            $this->order['country'] = $country->country_code;

            $this->selectedMarketplace[$key] = $market;
        }
        $order_items_count = $this->orderModel->order_items->count();


        for ($i = 0; $i < $order_items_count; $i++) {
            //$i = $i + 1;

            $this->i = $i;
            array_push($this->inputs, $i);
        }
        $this->reCalculateOrderTotal();
    }


    public function render()
    {
        return view('livewire.asin-update', ['order' => $this->order]);
    }
    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);

        //$this->order['order_details']['product'][$i] = [];
        $this->isAddClicked = true;
    }
    public function remove($i)
    {
        $this->deletedSkus[] = $this->order['order_details']['product'][$i]['sku'];
        unset($this->inputs[$i]);
        unset($this->order['order_details']['product'][$i]);
        $this->reCalculateOrderTotal();
        $this->selectedMarketplace[$i] = null;
    }
    public function tryshelexec($sku)
    {
        $req_id = 'request_' .Str::uuid()->toString();
        if (app()->environment('local')) {
            Log::debug(shell_exec(env('DUSK_COMMAND_LOCAL') . $req_id . ' ' . $sku));
        }
        if (app()->environment('production')) {
            Log::debug(shell_exec(env('DUSK_COMMAND_PROD') . $req_id . ' ' . $sku));
        }
        return $req_id;
    }
    public function incrementShipping($shipping)
    {
        $country = $this->order['country'];

        $shipping_increment_rate = $country == 'us' ? setting('shipping.shipping_increment_rate_for_usa') ?? 0 : setting('shipping.shipping_increment_rate_for_canada') ?? 0;
        $shipping = (float) $shipping;
        if ($shipping == 0 || $shipping_increment_rate == 0) {
            return $shipping;
        }
        return $shipping + ($shipping / 100  * $shipping_increment_rate);
    }
    public function getProductData($sku, $id)
    {
        $req_id = $this->tryshelexec($sku);

        $AmazonRequest = DB::table('amazon_requests')->where('request_id', $req_id)->get()->first();
        if ($AmazonRequest) {
            $weight = $this->incrementShipping($AmazonRequest->weight);
            $height = $this->incrementShipping($AmazonRequest->height);
            $length = $this->incrementShipping($AmazonRequest->length);
            $width = $this->incrementShipping($AmazonRequest->width);

            $this->order['order_details']['product'][$id]['sku'] = $AmazonRequest->sku;
            $this->order['order_details']['product'][$id]['width'] = $width;
            $this->order['order_details']['product'][$id]['height'] = $height;
            $this->order['order_details']['product'][$id]['length'] = $length;
            $this->order['order_details']['product'][$id]['weight'] = $weight;
            $this->order['order_details']['product'][$id]['buying_price'] = $AmazonRequest->buying_price;
            $this->order['order_details']['product'][$id]['product_image'] = $AmazonRequest->product_image;
            $this->order['order_details']['product'][$id]['product_name'] = $AmazonRequest->product_name;
            $this->order['order_details']['product'][$id]['data_fetched'] = true;
            $dimensional_weight = ($length * $width * $height) / 139;
            $base_weight = $weight > $dimensional_weight ? $weight : $dimensional_weight;
            $this->order['order_details']['product'][$id]['base_weight'] = $base_weight;
        } else {
            $this->addError('productnotfound', 'Ürün bilgileri alınamadı');
            $this->addError('productnotfoundid', 'productnotfoundid_' . $id);
        }


        $this->lastFetchError = ['sku' => $sku, 'id' => $id];
        $this->isFirstFetch = false;
    }
    public function skuFormChanged($sku, $id)
    {
        $this->emit('skuFormChanged', $sku, $id);
    }
    public function quantityChanged($id, $quantity)
    {
        $this->emit('quantityChanged', $id, $quantity);
    }
    public function buyingPriceChanged($id, $quantity)
    {
        $this->emit('buyingPriceChanged', $id, $quantity);
        $this->reCalculateOrderTotal();
    }
    public function widthChanged($id, $quantity)
    {
        $this->emit('widthChanged', $id, $quantity);
        $this->reCalculateOrderTotal();
    }
    public function heightChanged($id, $quantity)
    {
        $this->emit('heightChanged', $id, $quantity);
        $this->reCalculateOrderTotal();
    }
    public function lengthChanged($id, $quantity)
    {
        $this->emit('lengthChanged', $id, $quantity);
        $this->reCalculateOrderTotal();
    }

    public function weightChanged($id, $quantity)
    {
        $this->emit('weightChanged', $id, $quantity);
        $this->reCalculateOrderTotal();
    }


    public function handleCountrySelected($data)
    {
        $country = json_decode($data)->country_code;
        $this->setSelectedCountry($data);
        $this->order['country'] = $country;
        $this->emit('ItemSelected', 'countriesOpen');
    }
    public function handleMarketPlaceSelected($id, $data)
    {
        $marketplace = json_decode($data)->code;
        $this->setSelectedMarketPlace($id, $data);
        $this->order['order_details']['product'][$id]['marketplace'] = $marketplace;
        $this->emit('ItemSelected', 'marketPlacesOpen', $id);
    }



    public function saveOrder()
    {
        /*     $this->validate(
          $this->firstSubmitRules(),
          $this->firstSubmitMessages
        ); */
        $country = Country::where('country_code', $this->order['country'])->first();
        $order = Order::create(
            [
        "user_id" => auth()->user()->id,
        "status" => "Ödeme Bekliyor",
        "service_country_id" => $country->id,
        "total_quantity" => $this->order['order_details']['total_quantity'],
        "total_weight" => $this->order['order_details']['total_weight'],
        "order_total" => $this->order['order_details']['total_price'],
        "order_total_prime" => $this->order['order_details']['total_price_prime'],
        "order_total_basic" => $this->order['order_details']['total_price_basic'],
      ]
        );
        $this->order['order_details']['order_id'] = $order->id;

        $address = auth()->user()->shipping_address_line() .
      auth()->user()->shipping_address_line_2() .
      '/' .
      $this->order['order_details']['order_id'];

        $order->update(
            [
        "warehouse_address" => $address,
      ]
        );

        $order_items_mapped = collect($this->order['order_details']['product'])->map(function ($item, $key) use ($order) {
            return [
        'order_id' => $order->id,
        'unique_identifier' => $item['sku'],
        'width' => $item['width'],
        'height' => $item['height'],
        'length' => $item['length'],
        'weight' => $item['weight'],
        'quantity' => $item['quantity'],
        'buying_price' => $item['buying_price'],
        'product_name' => $item['product_name'] ?? 'Product_' . $key . '_Order_' . $order->id,
        'product_image' => $item['product_image'] ?? 'https://thumbs.dreamstime.com/b/no-image-available-icon-flat-vector-no-image-available-icon-flat-vector-illustration-132482953.jpg',
        'customer_note' => $item['note'] ?? null,
        'service_marketplace_id' => Marketplace::where('name', $item['marketplace'])->first()->id,
        'color' => $item['color'] ?? null,
      ];
        });

        $order_items = $order->order_items()->createMany(
            $order_items_mapped->toArray()
        );
        $this->isOrderCreated = true;
        return $order;
    }

    public function updateOrder($withMessage = false)
    {
        $this->reCalculateOrderTotal();
        if ($this->order_box_instructions && count($this->order_box_instructions) > 0) {
            $this->orderModel->box_instruction = $this->order_box_instructions;
            $this->orderModel->save();
        }
        $country = Country::where('country_code', $this->order['country'])->first();
        $order = $this->orderModel->update(
            [
        "total_quantity" => $this->order['order_details']['total_quantity'],
        "total_weight" => $this->order['order_details']['total_weight'],
        "order_total" => $this->order['order_details']['total_price'],
        "order_total_prime" => $this->order['order_details']['total_price_prime'],
        "order_total_basic" => $this->order['order_details']['total_price_basic'],
      ]
        );


        $order_items_mapped = collect($this->order['order_details']['product'])->map(function ($item, $key) use ($order) {
            return [
        'order_id' => $this->orderModel->id,
        'unique_identifier' => $item['sku'],
        'width' => $item['width'],
        'height' => $item['height'],
        'length' => $item['length'],
        'weight' => $item['weight'],
        'quantity' => $item['quantity'],
        'buying_price' => $item['buying_price'],
        'product_name' => $item['product_name'] ?? 'Product_' . $key . '_Order_' . $order->id,
        'product_image' => $item['product_image'] ?? 'https://thumbs.dreamstime.com/b/no-image-available-icon-flat-vector-no-image-available-icon-flat-vector-illustration-132482953.jpg',
        'customer_note' => $item['note'] ?? null,
        'service_marketplace_id' => '1',
        'color' => $item['color'] ?? null,
      ];
        });

        $order_items = $this->orderModel->order_items()->get();
        $order_items_sku = $order_items->pluck('unique_identifier')->toArray();



        $deletedSkus = $this->deletedSkus;

        foreach ($order_items as $order_item) {
            if (in_array($order_item->unique_identifier, $deletedSkus)) {
                $order_item->delete();
            }
        }

        $order_items_mapped->each(function ($item, $key) use ($order_items, $deletedSkus, $order_items_sku) {
            if (!$order_items->where('unique_identifier', $item['unique_identifier'])->first()) {
                $this->orderModel->order_items()->create($item);
            }
            if ($order_items->where('unique_identifier', $item['unique_identifier'])->first()) {
                $order_items->where('unique_identifier', $item['unique_identifier'])->first()->update($item);
            }
        });

        if ($withMessage) {
            $this->alert('success', 'Asin Değişiklikleriniz Başarıyla Kaydedildi.', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
          ]);
        }
        return $order;
    }

    public function checkAnyMissingShippingSetting()
    {
        $missing = false;
        foreach (setting('shipping') as $s_item_key => $shipping_item) {
            if ($s_item_key == 'shipping_increment_rate_for_usa' || $s_item_key == 'shipping_increment_rate_for_canada') {
                continue;
            }


            if (!$shipping_item || empty($shipping_item)) {
                $missing = true;
                break;
            }
        }

        return $missing;
    }

    public function reCalculateOrderTotal()
    {
        $this->validate(
            $this->firstSubmitRules(),
            $this->firstSubmitMessages,
        );
        //dd('2da');
        $this->order['order_details']['total_weight'] = 0;
        $this->order['order_details']['total_quantity'] = 0;
        $this->order['order_details']['total_price'] = 0;
        $this->order['order_details']['total_price_prime'] = 0;
        $this->order['order_details']['total_price_basic'] = 0;
        $this->order['order_details']['total_dimensional'] = 0;
        $this->order['order_details']['total_weight_f'] = 0;
        $this->order['order_details']['total_prod_count'] = 0;
        $this->order_box_instructions = [];

        foreach ($this->order['order_details']['product'] as $key => $value) {
            $base_weight = null;
            if (!isset($value['base_weight'])) {
                $weight = $value['weight'];
                $height = $value['height'];
                $length = $value['length'];
                $width = $value['width'];
                $dimensional_weight = ($length * $width * $height) / 139;
                $base_weight = $weight > $dimensional_weight ? $weight : $dimensional_weight;
            }
            if ($key == 1) {
                //dd($base_weight, $value['weight'], $value['height'], $value['length'], $value['width']);
            }
            //dd($base_weight, $value['weight'], $value['height'], $value['length'], $value['width']);
            $dimensional_weight = ($value['length'] * $value['width'] * $value['height']) / 139;
            $weight = $value['weight'];
            $base_weight = $weight > $dimensional_weight ? $weight : $dimensional_weight;
            Log::debug([$dimensional_weight, $value['length'], $value['width'], $value['height'], $value['weight'], $base_weight,$value['quantity']]);
            //dd($dimensional_weight);
            $this->order['order_details']['product'][$key]['dimensional_weightm'] = $dimensional_weight;

            $this->order['order_details']['total_weight'] +=  $base_weight * $value['quantity'];
            $this->order['order_details']['total_quantity'] += $value['quantity'];
            $this->order['order_details']['total_weight_f'] += $base_weight * $value['quantity'];
        }



        //check if any setting missing
        if ($this->checkAnyMissingShippingSetting()) {
            $this->alert('error', 'Devam edilemiyor lütfen yönetimle iletişime geçin.', [
        'position' => 'top-end',
        'timer' => 3000,
        'toast' => true,
        'timerProgressBar' => true,
      ]);
        }

        if ($this->order['country'] == 'ca') {
            $label_price = setting('shipping.default_label_service_price_for_canada');
            $shipping_price = setting('shipping.default_measure_based_service_price_for_canada');
            $default_shipping_service_price = setting('shipping.default_shipping_service_price_for_canada');
            $this->order['order_details']['order_total_prep'] = $this->order['order_details']['total_quantity'] * $label_price;

            $total_price =
        ($this->order['order_details']['total_weight'] * $shipping_price)
        + ($this->order['order_details']['total_quantity'] * $label_price)
        + $default_shipping_service_price;

            $total_prime = $total_price -  ($total_price / 100
        * setting('marketing.prime_discount_rate'));



            $this->order['order_details']['total_price_prime'] = $total_prime;
            $this->order['order_details']['total_price_basic'] = $total_price;

            if (auth()->user()->isPrime()) {
                $this->order['order_details']['total_price'] = $total_prime;
            } else {
                $this->order['order_details']['total_price'] = $total_price;
            }
        }

        if ($this->order['country'] == 'us') {
            $label_price = setting('shipping.default_label_service_price_for_usa');
            $shipping_price = setting('shipping.default_measure_based_service_price_for_usa');
            $default_shipping_service_price = setting('shipping.default_shipping_service_price_for_usa');
            $this->order['order_details']['order_total_prep'] = $this->order['order_details']['total_quantity'] * $label_price;


            $total_price =
        ($this->order['order_details']['total_weight'] * $shipping_price)
        + ($this->order['order_details']['total_quantity'] * $label_price)
        + $default_shipping_service_price;

            $total_prime = $total_price -  ($total_price / 100
        * setting('marketing.prime_discount_rate'));

            $this->order['order_details']['total_price_prime'] = $total_prime;
            $this->order['order_details']['total_price_basic'] = $total_price;

            if (auth()->user()->isPrime()) {
                $this->order['order_details']['total_price'] = $total_prime;
            } else {
                $this->order['order_details']['total_price'] = $total_price;
            }
        }






        $box_system = [];

        // add extra fees if order weight total is greater than the threshold
        if ($this->order['order_details']['total_weight_f'] > 50) {
            $total_box_count = ceil($this->order['order_details']['total_weight_f'] / 50);
            $colors = ['#FF0000	', '#FFA500', '#FFFF00', '#008000', '#0000FF', '#800080', '#FF00FF', '#00FFFF', '#000000', '#B22222', '#FF1493	', '#FF69B4', '#FFB6C1', '#FFC0CB', '#DB7093', '#C71585', '#FF00FF', '#F5DEB3', '#FFFACD', '#FAEBD7', '#D3D3D3', '#A9A9A9', '#808080', '#696969', '#000000'];
            foreach ($this->order['order_details']['product'] as $key => $value) {
                $this->order['order_details']['product'][$key]['color'] = $colors[$key];
            }

            $total_prod_count = 0;
            $this->order['order_details']['total_prod_count'] = $total_prod_count;
            $last_prod_key = null;
            $added_prod_count = 0;
            $added_prods = [];


            for ($i = 0; $i < $total_box_count; $i++) {
                $box_total = 0;



                foreach ($this->order['order_details']['product'] as $key => $value) {
                    /* if ($last_prod_key != null && $last_prod_key > $key) {
                        continue;
                    } */

                    !isset($added_prods[$value['sku']]) ? $added_prods[$value['sku']] = 0 : null;
                    /*  if ($value['quantity'] == $added_prods[$value['sku']]) {
                       continue;
                  } */

                    while ($value['weight'] + $box_total < 50 && $total_prod_count < $this->order['order_details']['total_quantity']  && $value['quantity'] > $added_prods[$value['sku']]) {
                        $box_total += $value['weight'];
                        $box_system[$i][] = $value;
                        $total_prod_count++;
                        $this->order['order_details']['total_prod_count']++;
                        $added_prod_count++;
                        $added_prods[$value['sku']] += 1;
                        //
                    }
                    $last_prod_key = $key;
                }

                if ($total_prod_count < $this->order['order_details']['total_quantity'] && $total_box_count == $i + 1) {
                    $total_box_count +=  1;
                }
            }
        }
        $this->boxsystem =  $box_system;

        $order_box_instructions = [];
        foreach ($this->boxsystem as $box_system_key => $box) {
            foreach ($box as $box_item_key => $boxitem) {
                !isset($this->boxsystem[$box_system_key]['counts'][$boxitem['sku']]) ? $this->boxsystem[$box_system_key]['counts'][$boxitem['sku']] = [] : null;
                !isset($this->boxsystem[$box_system_key]['counts'][$boxitem['sku']]['count']) ? $this->boxsystem[$box_system_key]['counts'][$boxitem['sku']]['count'] = 0 : null;
                !isset($this->boxsystem[$box_system_key]['counts'][$boxitem['sku']]['color']) ? $this->boxsystem[$box_system_key]['counts'][$boxitem['sku']]['color'] = '' : null;

                !isset($order_box_instructions[$box_system_key][$boxitem['sku']]) ? $order_box_instructions[$box_system_key][$boxitem['sku']] = [] : null;
                !isset($order_box_instructions[$box_system_key][$boxitem['sku']]['count']) ? $order_box_instructions[$box_system_key][$boxitem['sku']]['count'] = 0 : null;
                !isset($order_box_instructions[$box_system_key][$boxitem['sku']]['color']) ? $order_box_instructions[$box_system_key][$boxitem['sku']]['color'] = '' : null;

                $this->boxsystem[$box_system_key]['counts'][$boxitem['sku']]['count'] += 1;
                $this->boxsystem[$box_system_key]['counts'][$boxitem['sku']]['color'] = $boxitem['color'];
                $order_box_instructions[$box_system_key][$boxitem['sku']]['count'] += 1;
                $order_box_instructions[$box_system_key][$boxitem['sku']]['color'] = $boxitem['color'];
            }
        }
        $this->order_box_instructions = $order_box_instructions;
        $extra_box_count = ceil($this->order['order_details']['total_weight_f'] / 50) - 1;
        $extra_box_setting = $this->order['country'] == 'us' ? setting('shipping.default_shipping_service_for_extrabox_price_for_usa') : setting('shipping.default_shipping_service_for_extrabox_price_for_canada');
        $extra_charge_amount = $extra_box_count * $extra_box_setting;
        $this->order['order_details']['total_price'] += $extra_charge_amount;
        $this->order['order_details']['total_price_prime'] += $extra_charge_amount;
        $this->order['order_details']['total_price_basic'] += $extra_charge_amount;
    }
    public function createOrderBoxes()
    {
    }

    public function firstStepSubmit()
    {
        $this->validate(
            $this->firstSubmitRules(),
            $this->firstSubmitMessages,
        );

        $this->reCalculateOrderTotal();

        $user = auth()->user();
        $waiting_orders = Order::where('user_id', $user->id)->where('status', 'Ödeme Bekliyor')->count();
        if ($waiting_orders > 10) {
            return $this->alert('error', 'Lütfen öncelikle bekleyen siparişlerinizle ilgili işlem yapın', [
        'position' => 'top-end',
        'timer' => 3000,
        'toast' => true,
        'timerProgressBar' => true,
      ]);
        }


        if (!$this->isOrderCreated && !$this->backUsed) {
            $this->orderModel = $this->saveOrder();
        }
        if ($this->backUsed) {
            $this->updateOrder();
        }

        if ($this->order_box_instructions && count($this->order_box_instructions) > 0) {
            $this->orderModel->box_instruction = $this->order_box_instructions;
            $this->orderModel->save();
        }



        $this->currentStep = 2;
        $this->emit('stepChanged', $this->currentStep);
    }


    public function decreaseAmountFromAccount($user, $amount)
    {
        $user->balance -= $amount;
        $user->save();
    }

    public function secondStepSubmit($withoutPayment = false)
    {
        $this->withoutPayment = $withoutPayment;
        $order_id = $this->order['order_details']['order_id'];
        $order = Order::find($order_id);

        if (!$withoutPayment) {
            $price = $this->order['order_details']['total_price'];
            if ($price > auth()->user()->balance) {
                $this->alert('error', 'Bakiyeniz Bu İşlem İçin Yetersiz!', [
        'position' => 'top-end',
        'timer' => 3000,
        'toast' => true,
        'timerProgressBar' => true,
      ]);
                return;
            }

            $user_old_balance = auth()->user()->balance;
            $this->decreaseAmountFromAccount(auth()->user(), $price);




            UserActivity::create([
      'user_id' => auth()->user()->id,
      'activity_type' => 'Sipariş Ödemesi Yapıldı',
      'activity_data' => json_encode(['old_balance' => number_format($user_old_balance, 2), 'new_balance' => number_format(auth()->user()->balance, 2), 'price' => number_format($price, 2), 'order_id' => $order_id]),
    ]);
            $order->update(
                [
        "status" => "Eksik Bilgileri Tamamlayın",
      ]
            );
            $this->currentStep = 3;
            $this->emit('stepChanged', $this->currentStep);
            return;
        }

        $order->update(
            [
              "status" => "Ödeme Bekliyor",
            ]
        );
        // $validatedData = $this->validate([
        //     'status' => 'required',
        // ]);

        $this->currentStep = 3;
        $this->emit('stepChanged', $this->currentStep);
    }

    public function thirdStepSubmit()
    {
        // $validatedData = $this->validate([
        //     'status' => 'required',
        // ]);
        $this->validate(
            $this->thirdSubmitRules(),
            $this->thirdSubmitMessages,
        );


        $order_id = $this->order['order_details']['order_id'];
        $order = Order::find($order_id);
        $order_items = $order->order_items();
        $order_details = $this->order['order_details']['product'];
        $order_items->each(function ($item) use ($order_details, $order) {
            $fnsku = null;
            $labels = [];
            foreach ($order_details as $key => $value) {
                if ($item->unique_identifier == $value['sku']) {
                    $fnsku = $value['fnsku'] ?? null;
                    break;
                }
            };
            foreach ($this->order['order_details']['labels'] as $labelkey => $label) {
                $label_path = $label->storeAs('public/label', $item->id . '_' . $labelkey . '.pdf');
                $labels[] = $item->id . '_' . $labelkey . '.pdf';
            }
            $order->update([
        'labels' => json_encode($labels),
      ]);


            $item->fnsku = $fnsku;
            $item->save();
        });


        $this->currentStep = 4;
        $this->emit('stepChanged', $this->currentStep);
    }

    public function submitForm()
    {
        //$this->order['order_details']['product'][$index]['buyer_orders'];
        $order_id = $this->order['order_details']['order_id'];
        $order = Order::with('order_items.buyer_infos')->where('id', $order_id)->first();

        $buyer_info_list = [];
        foreach ($this->order['order_details']['product'] as $key => $value) {
            if (!isset($value['buyer_order_id']) || !isset($value['tracking_id'])) {
                continue;
            }
            if (empty($value['buyer_order_id']) && empty($value['tracking_id'])) {
                continue;
            }

            $buyer_info_list[$value['sku']][] = ['buyer_order_id' => $value['buyer_order_id'], 'tracking_id' => $value['tracking_id']];
        }

        $order->order_items()->each(function ($item) use ($buyer_info_list) {
            if (isset($buyer_info_list[$item->unique_identifier])) {
                $item->buyer_order_id = json_encode($buyer_info_list[$item->unique_identifier]);

                $item->save();
            }
        });
        //dd($order);

        // check if any missing information
        if (count($buyer_info_list) < 1 || $order->labels == null) {
            $order->update([
            'status' => 'Eksik Bilgileri Tamamlayın',
          ]);
        } else {
            $order->update([
            'status' => 'Kargo Bekleniyor',
          ]);
        }

        foreach ($order->order_items() as $order_itm) {
            if ($order_itm->fnsku == null) {
                $order->update([
            'status' => 'Eksik Bilgileri Tamamlayın',
          ]);
            }
        }
        if ($this->withoutPayment) {
            $order->update([
          'status' => 'Ödeme Bekliyor',
        ]);
        }





        $this->currentStep = 5;
        $this->emit('stepChanged', $this->currentStep);
    }

    public function closeSelector($selector)
    {
        $this->{$selector} = false;
    }

    public function back($step)
    {
        $this->currentStep = $step;
        $this->backUsed = true;
    }
    public function marketPlacesToggle($id)
    {
        if (!isset($this->marketPlacesOpen[$id])) {
            $this->marketPlacesOpen[$id] = true;
        }
        $this->marketPlacesOpen[$id] = !$this->marketPlacesOpen[$id];
    }

    public function setSelectedCountry($country)
    {
        $this->selectedCountry = $country;
    }

    public function setSelectedMarketPlace($id, $marketplace)
    {
        $this->selectedMarketplace[$id] = $marketplace;
    }
    public function updatedOrder()
    {
        $allFormsReady = false;
        foreach ($this->order['order_details']['product'] as $key => $value) {
            if (isset($value['sku']) && isset($value['quantity'])  && isset($value['buying_price'])  && isset($value['width'])  && isset($value['height'])  && isset($value['length'])  && isset($value['weight'])) {
                $allFormsReady = true;
            } else {
                $allFormsReady = false;
                break;
            }
        }

        if (!$allFormsReady) {
            return;
        }
        $this->validate(
            $this->firstSubmitRules(),
            $this->firstSubmitMessages,
        );
        $this->reCalculateOrderTotal();
    }
}
