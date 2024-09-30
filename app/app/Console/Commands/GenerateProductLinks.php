<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Webkul\Product\Repositories\ProductRepository;

class GenerateProductLinks extends Command
{
    protected $signature = 'generate:product-links';

    protected $description = 'Generate product links for all products';

    protected $productRepository;

    /**
     * @param \Webkul\Product\Repositories\ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        parent::__construct();
        $this->productRepository = $productRepository;
    }

    /**
     * @return void
     */
    public function handle()
    {
        $products = $this->productRepository->all();
        $links = [];
        foreach ($products as $product) {
            $links[] = '/'.$product->url_key;
        }
        file_put_contents(storage_path('product_links.txt'), implode("\n", $links));
        $this->info('Links have been saved to ' . storage_path('product_links.txt'));
    }
}
