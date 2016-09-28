<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->truncateTables(array(
            'users',
            'password_resets',
            'tickets',
            'ticket_votes',
            'ticket_comments'
        ));
        $this->call(UsersTableSeeder::class);
        $this->call(TicketTableSeeder::class);
    }

    public function truncateTables($tables)
    {
        $this->checkForeignKeys(false);
        foreach ($tables as $table) {

            DB::table($table)->truncate();
        }
        $this->checkForeignKeys(true);
    }

    public function checkForeignKeys($check)
    {
        $check = $check ? '1' : '0';
        DB::statement("SET FOREIGN_KEY_CHECKS =$check;");
    }
}
