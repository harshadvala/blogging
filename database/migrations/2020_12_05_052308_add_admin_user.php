<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class AddAdminUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $user = new User();
        $user->fill([
            'email' => 'admin@blog.com',
            'password' => Hash::make('admin@123'),
            'name' => 'Admin User',
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
        $user->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        User::where('email', 'admin@blog.com')->delete();
    }
}
