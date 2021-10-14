<?php

namespace Database\Seeders;

use App\Models\CustomerLinkedAccount;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        \App\Models\VoucherHistory::create([
            'voucher_id' => \App\Models\Voucher::inRandomOrder()->first()->voucher_id,
            'order_id' => $faker->uuid,
            'customer_id' => 'f03a276b-3324-4f03-b622-484013d8a8a4',
            'voucher_history_id' => $faker->uuid,
        ]);

        // $images = [
        //     'https://image.freepik.com/free-vector/gradient-sale-background_23-2148948683.jpg?size=500&ext=webp',
        //     'https://image.freepik.com/free-vector/gradient-10-10-background_23-2149058126.jpg?size=500&ext=webp',
        //     'https://image.freepik.com/free-vector/gradient-flash-sale-background_23-2149027975.jpg?size=500&ext=webp',
        //     'https://img.freepik.com/free-vector/super-sale-horizontal-banner_52683-59532.jpg?size=338&ext=jpg?size=500&ext=webp',
        //     'https://img.freepik.com/free-vector/final-sale-horizontal-banner_52683-59534.jpg?size=338&ext=jpg?size=500&ext=webp',
        //     'https://image.freepik.com/free-vector/mega-sale-background-shop-now_23-2148902866.jpg?size=500&ext=webp',
        //   ];

        // for ($i = 0; $i < count($images); ++$i) {
        //     \App\Models\Voucher::create([
        //         'voucher_id' => $faker->uuid,
        //         'voucher_code' => Str::upper($faker->word),
        //         'voucher_image' => $images[$i],
        //         'voucher_description' => $faker->text(2000),
        //         'voucher_start' => Carbon::now(),
        //         'voucher_end' => Carbon::now()->addMonth(),
        //         'voucher_limit' => mt_rand(1, 3),
        //         'voucher_amount' => mt_rand(5000, 20000),
        //     ]);
        // }

        // \App\Models\MitraFee::create([
        //     'mitra_fee_id' => $faker->uuid,
        //     'mitra_fee_type' => 'FLAT',
        //     'mitra_fee' => '500',
        // ]);

        // \App\Models\MitraFee::create([
        //     'mitra_fee_id' => $faker->uuid,
        //     'mitra_fee_type' => 'PERCENTAGE',
        //     'mitra_fee' => '10',
        // ]);

        // \App\Models\ShippingFee::create([
        //     'shipping_fee_id' => $faker->uuid,
        //     'shipping_fee_delivery_type' => 'LANGSUNG',
        //     'shipping_fee' => 1000,
        // ]);

        // \App\Models\ShippingFee::create([
        //     'shipping_fee_id' => $faker->uuid,
        //     'shipping_fee_delivery_type' => 'TERJADWAL',
        //     'shipping_fee' => 10000,
        // ]);

        // $customer = \App\Models\Customer::first();

        // CustomerLinkedAccount::create([
        //     'customer_id' => $customer->customer_id,
        //     'customer_linked_account_name' => 'Kebab',
        // ]);

        // $products = Product::all();

        // $i = 1;
        // foreach ($products as $product) {
        //     $product->update([
        //         'product_cover' => 'https://loremflickr.com/350/350/'.$faker->domainWord(),
        //     ]);

        //     ++$i;
        // }

        // $faker = \Faker\Factory::create();

        // for ($z = 0; $z < 5; $z++) {
        //     $random = $faker->uuid();

        //     \App\Models\Bundle::create([
        //         'bundle_id' => $random,
        //         'bundle_name' => $faker->catchPhrase,
        //         'bundle_description' => $faker->sentence(),
        //         'bundle_image' => 'https://image.freepik.com/free-vector/realistic-3d-sale-background_52683-63257.jpg',
        //         'bundle_show' => 1,
        //     ]);

        //     for ($i = 0; $i < 20; $i++) {
        //         $product = \App\Models\Product::inRandomOrder()->first();

        //         \App\Models\ProductBundle::create([
        //             'product_id' => $product->product_id,
        //             'bundle_id' => $random,
        //             'product_bundle_id' => $faker->uuid(),
        //         ]);
        //     }
        // }

        // $categories = \App\Models\Category::all();

        // foreach ($categories as $category) {
        //     $rand = mt_rand(0, 1);

        //     $category->update([
        //         'category_description' => $faker->sentence(),
        //     ]);
        // }

        // \App\Models\Category::factory()->create([
        //     'category_image' => 'https://res.cloudinary.com/vjtechsolution/image/upload/v1630477387/ayo%20mobile/steak.png'
        // ]);

        // \App\Models\Category::factory()->create([
        //     'category_image' => 'https://res.cloudinary.com/vjtechsolution/image/upload/v1630477386/ayo%20mobile/cereals.png'
        // ]);

        // \App\Models\Category::factory()->create([
        //     'category_image' => 'https://res.cloudinary.com/vjtechsolution/image/upload/v1630477386/ayo%20mobile/fish.png'
        // ]);

        // \App\Models\Category::factory()->create([
        //     'category_image' => 'https://res.cloudinary.com/vjtechsolution/image/upload/v1630477386/ayo%20mobile/salmon.png'
        // ]);

        // \App\Models\Category::factory()->create([
        //     'category_image' => 'https://res.cloudinary.com/vjtechsolution/image/upload/v1630477386/ayo%20mobile/salad.png'
        // ]);

        // \App\Models\Category::factory()->create([
        //     'category_image' => 'https://res.cloudinary.com/vjtechsolution/image/upload/v1630477386/ayo%20mobile/salad_1.png'
        // ]);

        // \App\Models\Category::factory()->create([
        //     'category_image' => 'https://res.cloudinary.com/vjtechsolution/image/upload/v1630477386/ayo%20mobile/watermelon.png'
        // ]);

        // for($i=0; $i<2; $i++) {
        //     $category = \App\Models\Category::factory()->create();

        //     for($z=0; $z<10; $z++) {
        //         $subCategory = \App\Models\SubCategory::factory()->create([
        //             'category_id' => $category->category_id
        //         ]);

        //         \App\Models\Product::factory(100)->create([
        //             'category_id' => $category->category_id,
        //             'sub_category_id' => $subCategory->sub_category_id,
        //             'product_is_exclusive' => ($i == 0) ? 1:0,
        //             'product_delivery_type' => ($i == 0) ? 'LANGSUNG':'TERJADWAL'
        //         ]);
        //     }

        //     \App\Models\BannerPrimary::factory(3)->create();

        //     \App\Models\BannerSecondary::factory(3)->create([
        //         'category_id' => $category->category_id
        //     ]);
        // }

        // $product = \App\Models\Product::all();

        // foreach($product as $item) {
        //     $units = ['kg', 'gr', 'ikat', 'unit', 'buah'];
        //     $key = array_rand($units);
        //     $unit = $units[$key];
        //     $unit_value = mt_rand(1, 200);
        //     $item->update([
        //         'product_unit' => $unit,
        //         'product_unit_value' => $unit_value,
        //     ]);
        // }

        // \App\Models\Search::factory(500)->create([
        //     'customer_id' => \App\Models\Customer::inRandomOrder()->first()->customer_id,
        // ]);

        // $search = \App\Models\Search::all();

        // foreach($search as $item) {
        //     $user = \App\Models\Customer::inRandomOrder()->first();
        //     $item->update([
        //         'customer_id' => $user->customer_id,
        //     ]);
        // }

        // \App\Models\ProductFavourite::factory(400)->create();

        // $product = \App\Models\Product::inRandomOrder()->first();
        // $qty = mt_rand(0, 10);

        // \App\Models\CartItem::create([
        //     'customer_id' => '1qHy6ec31RRoxKHxSh7LvPS4OLy2',
        //     'product_id' => $product->product_id,
        //     'cart_item_id' => Str::uuid(),
        //     'cart_item_note' => 'Bla bla bla',
        //     'cart_item_qty' => $qty,
        //     'cart_item_price' => $product->product_final_price * $qty,
        // ]);

        // \App\Models\PaymentChannel::create([
        //     'payment_channel_id' => Str::uuid(),
        //     'payment_channel_code' => 'COD',
        //     'payment_channel_name' => 'Cash On Delivery',
        //     'payment_channel_icon' => 'https://res.cloudinary.com/vjtechsolution/image/upload/v1607621251/mock/cod.png',
        //     'payment_channel_active' => 1,
        // ]);

        // \App\Models\PaymentChannel::create([
        //     'payment_channel_id' => Str::uuid(),
        //     'payment_channel_code' => 'MYBVA',
        //     'payment_channel_name' => 'Maybank Virtual Account',
        //     'payment_channel_icon' => 'https://res.cloudinary.com/vjtechsolution/image/upload/v1627370426/ayo%20mobile/AnyConv.com__maybank.png',
        //     'payment_channel_active' => 1,
        // ]);

        // \App\Models\PaymentChannel::create([
        //     'payment_channel_id' => Str::uuid(),
        //     'payment_channel_code' => 'PERMATAVA',
        //     'payment_channel_name' => 'Permata Virtual Account',
        //     'payment_channel_icon' => 'https://res.cloudinary.com/vjtechsolution/image/upload/v1627370425/ayo%20mobile/AnyConv.com__permatabank.png',
        //     'payment_channel_active' => 1,
        // ]);

        // \App\Models\PaymentChannel::create([
        //     'payment_channel_id' => Str::uuid(),
        //     'payment_channel_code' => 'BNIVA',
        //     'payment_channel_name' => 'BNI Virtual Account',
        //     'payment_channel_icon' => 'https://res.cloudinary.com/vjtechsolution/image/upload/v1627370426/ayo%20mobile/AnyConv.com__bniva.png',
        //     'payment_channel_active' => 1,
        // ]);

        // \App\Models\PaymentChannel::create([
        //     'payment_channel_id' => Str::uuid(),
        //     'payment_channel_code' => 'BRIVA',
        //     'payment_channel_name' => 'BRI Virtual Account',
        //     'payment_channel_icon' => 'https://res.cloudinary.com/vjtechsolution/image/upload/v1627370426/ayo%20mobile/AnyConv.com__briva.png',
        //     'payment_channel_active' => 1,
        // ]);

        // \App\Models\PaymentChannel::create([
        //     'payment_channel_id' => Str::uuid(),
        //     'payment_channel_code' => 'MANDIRIVA',
        //     'payment_channel_name' => 'Mandiri Virtual Account',
        //     'payment_channel_icon' => 'https://res.cloudinary.com/vjtechsolution/image/upload/v1627370426/ayo%20mobile/AnyConv.com__mandiriva.png',
        //     'payment_channel_active' => 1,
        // ]);

        // \App\Models\PaymentChannel::create([
        //     'payment_channel_id' => Str::uuid(),
        //     'payment_channel_code' => 'BCAVA',
        //     'payment_channel_name' => 'BCA Virtual Account',
        //     'payment_channel_icon' => 'https://res.cloudinary.com/vjtechsolution/image/upload/v1627370426/ayo%20mobile/AnyConv.com__bcava.png',
        //     'payment_channel_active' => 1,
        // ]);

        // \App\Models\PaymentChannel::create([
        //     'payment_channel_id' => Str::uuid(),
        //     'payment_channel_code' => 'MUAMALATVA',
        //     'payment_channel_name' => 'Muamalat Virtual Account',
        //     'payment_channel_icon' => 'https://res.cloudinary.com/vjtechsolution/image/upload/v1627370425/ayo%20mobile/AnyConv.com__muamalat.png',
        //     'payment_channel_active' => 1,
        // ]);

        // \App\Models\PaymentChannel::create([
        //     'payment_channel_id' => Str::uuid(),
        //     'payment_channel_code' => 'CIMBVA',
        //     'payment_channel_name' => 'CIMB Virtual Account',
        //     'payment_channel_icon' => 'https://res.cloudinary.com/vjtechsolution/image/upload/v1627370426/ayo%20mobile/AnyConv.com__cimb.png',
        //     'payment_channel_active' => 1,
        // ]);

        // \App\Models\PaymentChannel::create([
        //     'payment_channel_id' => Str::uuid(),
        //     'payment_channel_code' => 'ALFAMART',
        //     'payment_channel_name' => 'Alfamart',
        //     'payment_channel_icon' => 'https://res.cloudinary.com/vjtechsolution/image/upload/v1627370428/ayo%20mobile/AnyConv.com__alfamart.png',
        //     'payment_channel_note' => 'Biaya tambahan Rp 2.500 dibebankan kepada pelanggan pada saat pembayaran di kasir',
        //     'payment_channel_active' => 1,
        // ]);

        // \App\Models\PaymentChannel::create([
        //     'payment_channel_id' => Str::uuid(),
        //     'payment_channel_code' => 'ALFAMIDI',
        //     'payment_channel_name' => 'Alfamidi',
        //     'payment_channel_icon' => 'https://res.cloudinary.com/vjtechsolution/image/upload/v1627370428/ayo%20mobile/AnyConv.com__alfamidi.png',
        //     'payment_channel_note' => 'Biaya tambahan Rp 2.500 dibebankan kepada pelanggan pada saat pembayaran di kasir',
        //     'payment_channel_active' => 1,
        // ]);

        // \App\Models\PaymentChannel::create([
        //     'payment_channel_id' => Str::uuid(),
        //     'payment_channel_code' => 'QRISC',
        //     'payment_channel_name' => 'QRIS',
        //     'payment_channel_icon' => 'https://res.cloudinary.com/vjtechsolution/image/upload/v1627370425/ayo%20mobile/AnyConv.com__qris.png',
        //     'payment_channel_note' => 'Qris support pembayaran Dana, OVO, Gopay, Linkaja, ShopeePay, BCA Mobile, Maybank, CIMB, UOB, dan lainnya.',
        //     'payment_channel_active' => 1,
        // ]);
    }
}
