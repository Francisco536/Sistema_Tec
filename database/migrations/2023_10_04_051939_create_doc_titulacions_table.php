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
        Schema::create('doc_titulacions', function (Blueprint $table) {
            $table->id();
            $table->string('acto_recepcional');
            $table->string('no_inconveniencia');
            $table->string('lib_proyecto');
            $table->string('reg_proyecto');
            $table->string('solicitud');
            $table->string('const_ingles');
            $table->string('const_servsoc');
            $table->string('certificado');
            $table->string('acept_tesis');


            $table->string('id_user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doc_titulacions');
    }
};
