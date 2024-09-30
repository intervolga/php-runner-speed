<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Webkul\Category\Models\Category;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Attribute\Repositories\AttributeRepository;
use Faker\Factory as Faker;
use Webkul\Product\Models\Product;
use function Pest\Laravel\delete;


class ProductSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::query()->where('id','!=',1)->get();
        foreach ($categories as $category) {
            $category->delete();
        }
        $products = Product::all();
        foreach ($products as $product) {
            $product->delete();
        }

        $categoriesId = [];
        $categoryCollections = (new \Webkul\Faker\Helpers\Category())->create(10);
        foreach ($categoryCollections as $collection) {
            $categoriesId[] = $collection->id;
        }
        $productCollection = (new \Webkul\Faker\Helpers\Product())->create(2000, 'simple');
        /** @var Product $product */
        foreach ($productCollection as $product) {
            $randomKey = array_rand($categoriesId);
            $categoryId = $categoriesId[$randomKey];
            $product->categories()->sync([$categoryId], false);
            $product->refresh();
            Event::dispatch('catalog.product.update.after', $product);
        }
    }
}
