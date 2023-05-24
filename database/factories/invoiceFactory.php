<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Service;
use App\Models\Client;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\invoice>
 */
class invoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $clients = Client::all();
        $services = Service::all();
        $users = User::all();
        $statuses = ['PAID','UNPAID'];
      
        return [
            'invoice_number' => 'INV-0001',
            'client_id' => $this->faker->randomElement($clients),
            'service_ids' => $this->faker->randomElement($services),
            'due_date' => $this->faker->date,
            'invoiced_by' => $this->faker->randomElement($users),
            'total' => 3000,
            'sub_total' => 2700,
            'status' => $this->faker->randomElement($statuses),
            'vat' => 300,
            'inc_vat' => 2700,
            'credit' => 0.0,
        ];
    }
}
