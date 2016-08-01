<?php

use Illuminate\Database\Migrations\Migration;
use Laraveldaily\Quickadmin\Models\Menu;

class UpdateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Menu::insert([
            [
                'id'        => 3,
                'position'  => 0,
                'name'      => 'TelegramBot',
                'title'     => 'Telegram Bot',
                'menu_type' => 2,
                'icon'      => 'fa-database',
                'parent_id' => NULL,
            ],
            [
                'id'        => 4,
                'position'  => 0,
                'name'      => 'Bot',
                'title'     => 'Token Bot',
                'menu_type' => 1,
                'icon'      => 'fa-database',
                'parent_id' => 3,
            ],
            [
                'id'        => 5,
                'position'  => 1,
                'name'      => 'Channel',
                'title'     => 'Channel',
                'menu_type' => 1,
                'icon'      => 'fa-database',
                'parent_id' => 3,
            ]
        ]);
    }
}
