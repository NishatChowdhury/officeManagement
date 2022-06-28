<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\PermissionRole;

class CreatePermissionRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_role', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('permission_id');
            $table->unsignedInteger('role_id');
            $table->string('details',5000)->nullable();
            $table->timestamps();
        });

        for($i=1;$i<=13;$i++){
            PermissionRole::create([
                'role_id'=>1,
                'permission_id'=>$i
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission_role');
    }
}
