<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
   public function up(): void
   {
       Schema::create('jeux', function (Blueprint $table) {
           $table->id();
           $table->foreignId('studio_id')
                 ->nullable()
                 ->constrained('studios')
                 ->nullOnDelete();
           $table->string('nom');
           $table->text('description');
           $table->string('categorie');
           $table->date('date_sortie')->nullable();
           $table->integer('popularite')->default(0);
           $table->boolean('vr')->default(false);
           $table->timestamps();
       });
   }
   public function down(): void
   {
       Schema::dropIfExists('jeux');
   }
};
