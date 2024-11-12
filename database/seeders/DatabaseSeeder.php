<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
       // $this->seedDefaultUsers(2);
        $this->seedDefaultFood();
    }
    private function seedDefaultUsers(int $quantity)
    {
        for ($k = 0; $k < $quantity; $k++) {
            $suffix = substr('0' . ($k + 1), -2);
            \App\Models\User::factory()->create([
                'username' => 'user' . $suffix,
                'email' => 'user' . $suffix . '@tests.com',
                'nickname' =>'user' . $suffix,
                'password' => Hash::make('123456')
            ]);
        }
    }
    private function seedDefaultFood(){
        
        $categories = [
            "0" => "無攝取",
            "1" => "飲料類",
            "2" => "糕餅類",
            "3" => "冰品類",
            "4" => "加工調理類",
            "5" => "糖果類"
        ];
        foreach ($categories as $category){
            \App\Models\FoodCategories::create([
                'name'=>$category
            ]);
        }
        $path = storage_path()."/json/category.json";
        $path = file_get_contents($path);
        
        $json = json_decode($path, TRUE);
        foreach ($json as $key => $category){
            $categoryId = $key;
            $categoryName = $categories[$key];
            foreach ($category['data'] as $food){
                \App\Models\Foods::create([
                    'user_id' => 1,  
                    'category' => $categoryId, 
                    'category_name' => $categoryName, 
                    'name' => $food['name'], 
                    'weight' => $food['weight'], 
                    'unit' => $food['unit'],
                    'sugar_gram' => $food['sugar_gram'], 
                    'kcal' =>  $food['kcal']
                ]);

            }

        }
    }
}
