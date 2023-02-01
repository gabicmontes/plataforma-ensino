<?php

use App\Models\Permission;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permissions', function(Blueprint $table){
            Permission::create(['name' => 'Criar Matrícula']);
            Permission::create(['name' => 'Listar Matrículas']);
            Permission::create(['name' => 'Visualizar Matrícula']);
            Permission::create(['name' => 'Editar Matrícula']);
            Permission::create(['name' => 'Excluir Matrícula']);

            Permission::create(['name' => 'Criar Curso']);
            Permission::create(['name' => 'Listar Cursos']);
            Permission::create(['name' => 'Visualizar Curso']);
            Permission::create(['name' => 'Editar Curso']);
            Permission::create(['name' => 'Excluir Curso']);

            Permission::create(['name' => 'Criar Aluno']);
            Permission::create(['name' => 'Listar Alunos']);
            Permission::create(['name' => 'Visualizar Aluno']);
            Permission::create(['name' => 'Editar Aluno']);
            Permission::create(['name' => 'Excluir Aluno']);

            Permission::create(['name' => 'Criar Permissão']);
            Permission::create(['name' => 'Listar Permissões']);
            Permission::create(['name' => 'Visualizar Permissão']);
            Permission::create(['name' => 'Editar Permissão']);
            Permission::create(['name' => 'Excluir Permissão']);

            Permission::create(['name' => 'Criar Grupo']);
            Permission::create(['name' => 'Listar Grupos']);
            Permission::create(['name' => 'Visualizar Grupo']);
            Permission::create(['name' => 'Editar Grupo']);
            Permission::create(['name' => 'Excluir Grupo']);

            Permission::create(['name' => 'Criar Usuário']);
            Permission::create(['name' => 'Listar Usuários']);
            Permission::create(['name' => 'Visualizar Usuário']);
            Permission::create(['name' => 'Editar Usuário']);
            Permission::create(['name' => 'Excluir Usuário']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permissions', function(Blueprint $table){
            Permission::where('name', 'Criar Matrícula')->forceDelete();
            Permission::where('name', 'Listar Matrículas')->forceDelete();
            Permission::where('name', 'Visualizar Matrícula')->forceDelete();
            Permission::where('name', 'Editar Matrícula')->forceDelete();
            Permission::where('name', 'Excluir Matrícula')->forceDelete();

            Permission::where('name', 'Criar Curso')->forceDelete();
            Permission::where('name', 'Listar Cursos')->forceDelete();
            Permission::where('name', 'Visualizar Curso')->forceDelete();
            Permission::where('name', 'Editar Curso')->forceDelete();
            Permission::where('name', 'Excluir Curso')->forceDelete();

            Permission::where('name', 'Criar Aluno')->forceDelete();
            Permission::where('name', 'Listar Alunos')->forceDelete();
            Permission::where('name', 'Visualizar Aluno')->forceDelete();
            Permission::where('name', 'Editar Aluno')->forceDelete();
            Permission::where('name', 'Excluir Aluno')->forceDelete();

            Permission::where('name', 'Criar Permissão')->forceDelete();
            Permission::where('name', 'Listar Permissões')->forceDelete();
            Permission::where('name', 'Visualizar Permissão')->forceDelete();
            Permission::where('name', 'Editar Permissão')->forceDelete();
            Permission::where('name', 'Excluir Permissão')->forceDelete();

            Permission::where('name', 'Criar Grupo')->forceDelete();
            Permission::where('name', 'Listar Grupos')->forceDelete();
            Permission::where('name', 'Visualizar Grupo')->forceDelete();
            Permission::where('name', 'Editar Grupo')->forceDelete();
            Permission::where('name', 'Excluir Grupo')->forceDelete();

            Permission::where('name', 'Criar Usuário')->forceDelete();
            Permission::where('name', 'Listar Usuários')->forceDelete();
            Permission::where('name', 'Visualizar Usuário')->forceDelete();
            Permission::where('name', 'Editar Usuário')->forceDelete();
            Permission::where('name', 'Excluir Usuário')->forceDelete();
        });
    }
};
