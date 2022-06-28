<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Permission;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('details',5000)->nullable();
            $table->timestamps();
        });

        $permissions=['config_setup','Employee_add_view','Employee_update','Employee_delete','Domain_hosting_add_view','Domain_hosting_update','Domain_hosting_delete','Office_setup_add_view','Office_setup_update','Office_setup_delete','Accounts_add_view','AccountsUpdate','Accounts_delete'];
        foreach ($permissions as $permission){
            Permission::create([
                'name'=>$permission
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
        Schema::dropIfExists('permissions');
    }
}
