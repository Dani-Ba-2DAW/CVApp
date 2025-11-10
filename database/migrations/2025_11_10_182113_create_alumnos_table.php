<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('apellidos', 80);
            $table->string('telefono', 20)->nullable();
            $table->string('correo', 100)->unique();
            $table->date('fecha_nacimiento')->nullable();
            $table->decimal('nota_media', 4, 2)->nullable();
            $table->text('experiencia', 1000)->nullable();
            $table->string('formacion', 255)->nullable();
            $table->text('habilidades', 500)->nullable();
            $table->string('fotografia')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};
