<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Product::class;
    public function definition()
    {
        $product_name = $this->faker->unique()->words($nb=2,$asText=true);
        $slug = Str::slug($product_name);
        return [
            'name' => $product_name ,
            'slug' => $slug ,
            'description' => $this->faker->text(500) ,
            'regular_price' => $this->faker->numberBetween(200,600) ,
            'SKU' => 'DIGIT' . $this->faker->unique()->numberBetween(100,500) ,
            'stock' => 'instock' ,
            'qty' => $this->faker->numberBetween(100,200),
            'img' => 'fake_' . $this->faker->unique()->numberBetween(1,10) . '.jpg' ,
            'category_id' => $this->faker->numberBetween(1,5)
        ];
    }
}
