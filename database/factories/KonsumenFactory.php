<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Konsumen>
 */
class KonsumenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name_company' => 'a',
            'owner' => 'b',
            'phone' => '1',
            'email' => 'sd@gmail.com',
            'address' => 'a',
            'city' => 'pekanbaru',
            'country' => 'asas',
            'description_company' => 'ad',
            'type_customer' => 'asda',
            'deed_number' => 'dasa',
            'pkp' => 'asdas,',
            'npwp' => 'asdad',
        ];
    }
}
