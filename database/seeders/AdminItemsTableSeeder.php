<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;

class AdminItemsTableSeeder extends DataRowsTableSeeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {

        // CUSTOM MY BOOKS START
        $BookDataType = DataType::where('slug', 'items')->firstOrFail();

        $dataRow = $this->dataRow($BookDataType, 'id');
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

        $dataRow = $this->dataRow($BookDataType, 'name');
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

        $dataRow = $this->dataRow($BookDataType, 'is_available');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'checkbox',
                'display_name' => __('Доступна для бронирования'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 2,
            ])->save();
        }

        $dataRow = $this->dataRow($BookDataType, 'item_belongsto_author_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => __('author_id'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'details'      => [
                    'model'       => 'App\\Models\\Author',
                    'table'       => 'authors',
                    'type'        => 'belongsTo',
                    'column'      => 'author_id',
                    'key'         => 'id',
                    'label'       => 'name',
                    'pivot_table' => 'authors',
                    'pivot'       => '0',
                    'taggable'    => '0',
                ],
                'order'        => 10,
            ])->save();
        }



        $dataRow = $this->dataRow($BookDataType, 'item_belongstomany_genre_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => __('genre'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'details'      => [
                    'model'       => 'App\\Models\\Genre',
                    'table'       => 'genres',
                    'type'        => 'belongsToMany',
                    'column'      => 'id',
                    'key'         => 'id',
                    'label'       => 'name',
                    'pivot_table' => 'genre_item',
                    'pivot'       => '1',
                    'taggable'    => '0',
                ],
                'order'        => 11,
            ])->save();
        }


        $dataRow = $this->dataRow($BookDataType, 'created_at');
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

        $dataRow = $this->dataRow($BookDataType, 'updated_at');
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



    }
}