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
        Schema::table('carts', function (Blueprint $table) {
            // Add indexes for faster queries
            $table->index(['user_id', 'menu_item_id'], 'cart_user_menu_index');
            $table->index('user_id', 'cart_user_index');
            $table->index('menu_item_id', 'cart_menu_item_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->dropIndex('cart_user_menu_index');
            $table->dropIndex('cart_user_index');
            $table->dropIndex('cart_menu_item_index');
        });
    }
};
