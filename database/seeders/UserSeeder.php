<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds
     * @return void
     */
    public function run(): void
    {
        $iterator = json_decode(file_get_contents(__DIR__ . "/../schema/users.json"));
        foreach ($iterator as $item => $each) {
            User::query()->create(attributes: [
                'name'      => $each->name ?? sprintf('Ghost%d', ++$item),
                'email'     => $each->email ?? null,
                'phone'     => $each->mobile,
                'role'      => $each->role,
            ])->getKey();
        }
    }
}
