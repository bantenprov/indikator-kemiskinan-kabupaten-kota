<?php

Route::group(['prefix' => 'api/ik-kabupaten-kota', 'middleware' => ['web']], function() {
    $controllers = (object) [
        'index'     => 'Bantenprov\IKKabupatenKota\Http\Controllers\IKKabupatenKotaController@index',
        'create'    => 'Bantenprov\IKKabupatenKota\Http\Controllers\IKKabupatenKotaController@create',
        'show'      => 'Bantenprov\IKKabupatenKota\Http\Controllers\IKKabupatenKotaController@show',
        'store'     => 'Bantenprov\IKKabupatenKota\Http\Controllers\IKKabupatenKotaController@store',
        'edit'      => 'Bantenprov\IKKabupatenKota\Http\Controllers\IKKabupatenKotaController@edit',
        'update'    => 'Bantenprov\IKKabupatenKota\Http\Controllers\IKKabupatenKotaController@update',
        'destroy'   => 'Bantenprov\IKKabupatenKota\Http\Controllers\IKKabupatenKotaController@destroy',
    ];

    Route::get('/',             $controllers->index)->name('ik-kabupaten-kota.index');
    Route::get('/create',       $controllers->create)->name('ik-kabupaten-kota.create');
    Route::get('/{id}',         $controllers->show)->name('ik-kabupaten-kota.show');
    Route::post('/',            $controllers->store)->name('ik-kabupaten-kota.store');
    Route::get('/{id}/edit',    $controllers->edit)->name('ik-kabupaten-kota.edit');
    Route::put('/{id}',         $controllers->update)->name('ik-kabupaten-kota.update');
    Route::delete('/{id}',      $controllers->destroy)->name('ik-kabupaten-kota.destroy');
});
