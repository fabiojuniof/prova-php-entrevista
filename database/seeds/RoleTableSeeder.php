<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = new Role();
        $roleAdmin->name = 'Administrator';
        $roleAdmin->descricao = 'Usuário Administrador';
        $roleAdmin->save();

        $roleEditor = new Role();
        $roleEditor->name = 'Editor';
        $roleEditor->descricao = 'Usuário Editor';
        $roleEditor->save();

        $roleModerator = new Role();
        $roleModerator->name = 'Moderator';
        $roleModerator->descricao = 'Usuário Moderador';
        $roleModerator->save();

        $roleUser = new Role();
        $roleUser->name = 'User';
        $roleUser->descricao = 'Usuário Comum';
        $roleUser->save();
    }
}
