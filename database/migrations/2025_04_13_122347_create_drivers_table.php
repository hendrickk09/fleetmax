<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        
        // database/migrations/xxxx_xx_xx_create_drivers_table.php

Schema::create('drivers', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('license')->unique();
    $table->string('cpf')->unique()->nullable();     
    $table->string('cnh')->unique()->nullable();
    $table->string('contact')->nullable();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->timestamps();
});

    }

    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
