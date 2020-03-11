<?php

use Illuminate\Database\Seeder;
use App\Models\ModelUser;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(ModelUser $user)
    {
        $user->create([
            'nome' => 'Talles',
            'email' => 'talles@gmail.com',
            'cpf' => '14154764039',
            'telefone' => '31998333325',
            'endereco' => 'Rua Josue, 220',
            'estado' => 'MG',
            'cidade' => 'Betim',
            'dataNascimento' => '25/02/2000'
        ]);
        $user->create([
            'nome' => 'Joao',
            'email' => 'joao@gmail.com',
            'cpf' => '10425230023',
            'telefone' => '31998333325',
            'endereco' => 'Rua Mis, 220',
            'estado' => 'MG',
            'cidade' => 'Belo Horizonte',
            'dataNascimento' => '15/05/1997'
        ]);
        $user->create([
            'nome' => 'Maria',
            'email' => 'maria@gmail.com',
            'cpf' => '99470359054',
            'telefone' => '31998333325',
            'endereco' => 'Rua Josue, 220',
            'estado' => 'SP',
            'cidade' => 'Sao Paulo',
            'dataNascimento' => '16/02/1989'
        ]);
        $user->create([
            'nome' => 'Kauan',
            'email' => 'kauan@gmail.com',
            'cpf' => '31923334050',
            'telefone' => '31998333325',
            'endereco' => 'Rua Josue, 220',
            'estado' => 'ES',
            'cidade' => 'Praia',
            'dataNascimento' => '14/02/1966'
        ]);
    }
}
