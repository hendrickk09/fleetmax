<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
<<<<<<< HEAD
        
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

=======
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('license_number')->unique();
            $table->string('phone');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
>>>>>>> 3de785ae189018f88177b44d4d0e77c2b2cfd867
    }

    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
