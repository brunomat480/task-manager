<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Categorie;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('categories')->insert([
      [
        'name' => 'Limpeza',
      ],
      [
        'name' => 'Estudos',
      ],
      [
        'name' => 'Compras',
      ],
      [
        'name' => 'Trabalho',
      ]
    ]);
  }
}
