<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;

class AdminOrderItemsTableSeeder extends DataRowsTableSeeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
   {

     // CUSTOM MY AUTHORS START
    $AuthorDataType = DataType::where('slug', 'authors')->firstOrFail();

    $dataRow = $this->dataRow($AuthorDataType, 'id');
    if (!$dataRow->exists) {
        $dataRow->fill([
            'type'         => 'number',
            'display_name' => __('id'),
            'required'     => 0,
            'browse'       => 1,
            'read'         => 1,
            'edit'         => 0,
            'add'          => 0,
            'delete'       => 0,
            'order'        => 1,
        ])->save();
    }

    $dataRow = $this->dataRow($AuthorDataType, 'name');
    if (!$dataRow->exists) {
        $dataRow->fill([
            'type'         => 'text',
            'display_name' => __('name'),
            'required'     => 0,
            'browse'       => 1,
            'read'         => 1,
            'edit'         => 1,
            'add'          => 1,
            'delete'       => 1,
            'order'        => 2,
        ])->save();
    }



    //  END BOOK 

    // ORDER


    // CUSTOM MY BOOKS START
    $OrderDataType = DataType::where('slug', 'orders')->firstOrFail();

    $dataRow = $this->dataRow($OrderDataType, 'id');
    if (!$dataRow->exists) {
        $dataRow->fill([
            'type'         => 'number',
            'display_name' => __('id'),
            'required'     => 0,
            'browse'       => 1,
            'read'         => 1,
            'edit'         => 0,
            'add'          => 0,
            'delete'       => 0,
            'order'        => 1,
        ])->save();
    }


    $dataRow = $this->dataRow($OrderDataType, 'reserve');
    if (!$dataRow->exists) {
        $dataRow->fill([
            'type'         => 'checkbox',
            'display_name' => __('Забронировано'),
            'required'     => 0,
            'browse'       => 1,
            'read'         => 1,
            'edit'         => 1,
            'add'          => 1,
            'delete'       => 1,
            'order'        => 2,
        ])->save();
    }


    $dataRow = $this->dataRow($OrderDataType, 'book_is_given');
    if (!$dataRow->exists) {
    $dataRow->fill([
        'type'         => 'checkbox',
        'display_name' => __('Книга выдана'),
        'required'     => 0,
        'browse'       => 1,
        'read'         => 1,
        'edit'         => 1,
        'add'          => 1,
        'delete'       => 1,
        'order'        => 2,
    ])->save();
    }

    $dataRow = $this->dataRow($OrderDataType, 'book_is_returned');
    if (!$dataRow->exists) {
    $dataRow->fill([
        'type'         => 'checkbox',
        'display_name' => __('Книга прянта'),
        'required'     => 0,
        'browse'       => 1,
        'read'         => 1,
        'edit'         => 1,
        'add'          => 1,
        'delete'       => 1,
        'order'        => 2,
    ])->save();
    }


    $dataRow = $this->dataRow($OrderDataType, 'reserve_day');
    if (!$dataRow->exists) {
    $dataRow->fill([
        'type'         => 'timestamp',
        'display_name' => __('Забронированный день'),
        'required'     => 0,
        'browse'       => 1,
        'read'         => 1,
        'edit'         => 1,
        'add'          => 1,
        'delete'       => 1,
        'order'        => 22,
    ])->save();
    }


    $dataRow = $this->dataRow($OrderDataType, 'book_is_given_start');
    if (!$dataRow->exists) {
    $dataRow->fill([
        'type'         => 'timestamp',
        'display_name' => __('Книга выдана день'),
        'required'     => 0,
        'browse'       => 1,
        'read'         => 1,
        'edit'         => 1,
        'add'          => 1,
        'delete'       => 1,
        'order'        => 22,
    ])->save();
    }


    $dataRow = $this->dataRow($OrderDataType, 'book_is_given_end');
    if (!$dataRow->exists) {
    $dataRow->fill([
        'type'         => 'timestamp',
        'display_name' => __('Книга принята день'),
        'required'     => 0,
        'browse'       => 1,
        'read'         => 1,
        'edit'         => 1,
        'add'          => 1,
        'delete'       => 1,
        'order'        => 22,
    ])->save();
    }




    $dataRow = $this->dataRow($OrderDataType, 'created_at');
    if (!$dataRow->exists) {
        $dataRow->fill([
            'type'         => 'timestamp',
            'display_name' => __('voyager::seeders.data_rows.created_at'),
            'required'     => 0,
            'browse'       => 0,
            'read'         => 1,
            'edit'         => 0,
            'add'          => 0,
            'delete'       => 0,
            'order'        => 22,
        ])->save();
    }

    $dataRow = $this->dataRow($OrderDataType, 'updated_at');
    if (!$dataRow->exists) {
        $dataRow->fill([
            'type'         => 'timestamp',
            'display_name' => __('voyager::seeders.data_rows.updated_at'),
            'required'     => 0,
            'browse'       => 0,
            'read'         => 1,
            'edit'         => 0,
            'add'          => 0,
            'delete'       => 0,
            'order'        => 22,
        ])->save();
    }



    $dataRow = $this->dataRow($OrderDataType, 'order_belongsto_user_relationship');
    if (!$dataRow->exists) {
    $dataRow->fill([
        'type'         => 'relationship',
        'display_name' => __('ФИО Пользователь'),
        'required'     => 0,
        'browse'       => 1,
        'read'         => 1,
        'edit'         => 1,
        'add'          => 1,
        'delete'       => 0,
        'details'      => [
            'model'       => 'App\\Models\\User',
            'table'       => 'users',
            'type'        => 'belongsTo',
            'column'      => 'user_id',
            'key'         => 'id',
            'label'       => 'name',
            'pivot_table' => 'users',
            'pivot'       => '0',
            'taggable'    => '0',
        ],
        'order'        => 10,
    ])->save();
    }



    $dataRow = $this->dataRow($OrderDataType, 'order_belongsto_author_relationship');
    if (!$dataRow->exists) {
    $dataRow->fill([
        'type'         => 'relationship',
        'display_name' => __('Наименование книги'),
        'required'     => 0,
        'browse'       => 1,
        'read'         => 1,
        'edit'         => 1,
        'add'          => 1,
        'delete'       => 0,
        'details'      => [
            'model'       => 'App\\Models\\Item',
            'table'       => 'items',
            'type'        => 'belongsTo',
            'column'      => 'item_id',
            'key'         => 'id',
            'label'       => 'name',
            'pivot_table' => 'items',
            'pivot'       => '0',
            'taggable'    => '0',
        ],
        'order'        => 10,
    ])->save();
    }




    // ORDER END

   }
}