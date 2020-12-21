<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsPlaintesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_plaintes', function (Blueprint $table) {
            $table->id();
            $table->json('Etat_Civil');
            $table->json('Domicile');
            $table->string('Plaingnat');
            $table->string('Lieu_Infraction');
            $table->json('Eléments_susceptibles');
            $table->json('prejudice');
            $table->json('Fait_circonstance');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('details_plaintes');
    }
}
