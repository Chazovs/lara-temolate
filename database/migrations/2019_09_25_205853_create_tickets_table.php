<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description');// Текст заявки,
            $table->string('fio');//ФИО заявителя,
            $table->string('tel');//телефон,
            $table->string('adress');//Адрес,
            $table->integer('flat');//квартира,
            $table->boolean('delivery_status');//статус отправки на Битрикс 24,
            $table->string('ready_status');//Статус выполнения,
            $table->string('comment');//комментарий исполнителя,
            $table->string('position_curator');//должность исполнителя,
            $table->string('fio_curator');//ФИО исполнителя,
            $table->string('work_tel');//рабочий телефон исполнителя,
            $table->integer('task_id');//ID заявки на Битрикс24.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
