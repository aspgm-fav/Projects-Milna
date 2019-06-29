 <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PenyesuaianTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string("username")->unique();
            $table->string("phone");
            $table->string("image")->nullable();
            $table->text('address')->nullable();
            $table->string('sub_district')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->integer('zip_code')->nullable();
            $table->decimal('pay',13,2)->nullable();
            $table->boolean('admin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn("admin");
            $table->dropColumn("username");
            $table->dropColumn("phone");
            $table->dropColumn("image");
            $table->dropColumn("address");
            $table->dropColumn("sub_district");
            $table->dropColumn("city");
            $table->dropColumn("province");
            $table->dropColumn("zip_code");
            $table->dropColumn("pay");
        });
    }
}
