<?php

namespace Database\Seeders;

use App\Models\AdminMenu;
use Illuminate\Database\Seeder;

class AdminMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultMenu = [
            [
                'title' => 'Marks',
                'icon' => 'fa-bars',
                'uri' => 'marks',
                'permission' => '*',
                'order' => '0',
                'parent_id' => '0',
            ],
            [
                'title' => 'Car Models',
                'icon' => 'fa-bars',
                'uri' => 'car_models',
                'permission' => '*',
                'order' => '0',
                'parent_id' => '0',
            ],
        ];

        foreach ($defaultMenu as $item) {
            AdminMenu::firstOrCreate($item);
        }
    }
}
