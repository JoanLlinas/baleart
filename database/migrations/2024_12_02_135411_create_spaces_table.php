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
        Schema::create('spaces', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('regNumber', 10)->unique();
            $table->string('observation_CA', 5000)->nullable();
            $table->string('observation_ES', 5000)->nullable();
            $table->string('observation_EN', 5000)->nullable();
            $table->string('email', 100);
            $table->string('phone', 100);
            $table->string('website', 100);
            $table->string('accessType', 1);
            $table->float('totalScore');
            $table->float('countScore');
            $table->foreignId('address_id')->constrained();
            $table->foreignId('space_type_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */

    protected $fillable = [
        'name',
        'regNumber',
        'observation_CA',
        'observation_ES',
        'observation_EN',
        'email',
        'phone',
        'website',
        'accessType',
        'totalScore',
        'countScore',
        'address_id',
        'space_type_id',
        'user_id',
    ];

    protected $guarded = [
        'id'
    ];
    public function down(): void
    {
        Schema::dropIfExists('spaces');
    }
};
