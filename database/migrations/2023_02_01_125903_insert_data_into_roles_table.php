<?php

use App\Models\Permission;
use App\Models\Role;
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
        Schema::table('roles', function(Blueprint $table){
            $admin   = Role::create(['name' => 'Administrador']);
            $student = Role::create(['name' => 'Aluno']);
            $teacher = Role::create(['name' => 'Professor']);

            $admin->permissions()->attach(Permission::all());

            $student->permissions()->attach([
                Permission::where('name', 'Listar Matrículas')->first()->id,
                Permission::where('name', 'Visualizar Matrícula')->first()->id,
                Permission::where('name', 'Listar Cursos')->first()->id,
                Permission::where('name', 'Visualizar Curso')->first()->id,
                Permission::where('name', 'Visualizar Aluno')->first()->id,
                Permission::where('name', 'Editar Aluno')->first()->id,
            ]);

            $teacher->permissions()->attach([
                Permission::where('name', 'Listar Matrículas')->first()->id,
                Permission::where('name', 'Visualizar Matrícula')->first()->id,
                Permission::where('name', 'Listar Cursos')->first()->id,
                Permission::where('name', 'Visualizar Curso')->first()->id,
                Permission::where('name', 'Visualizar Professor')->first()->id,
                Permission::where('name', 'Editar Professor')->first()->id,
            ]);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles', function(Blueprint $table){

            $admin = Role::where('name', 'Administrador')->first();
            $admin->permissions()->detach(Permission::all());
            $admin->delete();

            $student = Role::where('name', 'Aluno')->first();
            $student->permissions()->detach([
                Permission::where('name', 'Listar Matrículas')->first()->id,
                Permission::where('name', 'Visualizar Matrícula')->first()->id,
                Permission::where('name', 'Listar Cursos')->first()->id,
                Permission::where('name', 'Visualizar Curso')->first()->id,
                Permission::where('name', 'Visualizar Aluno')->first()->id,
                Permission::where('name', 'Editar Aluno')->first()->id,
            ]);
            Role::where('name', 'Aluno')->forceDelete();

            $teacher = Role::where('name', 'Professor')->first();
            $teacher->permissions()->detach([
                Permission::where('name', 'Listar Matrículas')->first()->id,
                Permission::where('name', 'Visualizar Matrícula')->first()->id,
                Permission::where('name', 'Listar Cursos')->first()->id,
                Permission::where('name', 'Visualizar Curso')->first()->id,
                Permission::where('name', 'Visualizar Professor')->first()->id,
                Permission::where('name', 'Editar Professor')->first()->id,
            ]);

        });
    }
};
