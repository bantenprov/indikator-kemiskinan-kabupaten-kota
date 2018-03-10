<?php

namespace Bantenprov\IKKabupatenKota\Models\Bantenprov\IKKabupatenKota;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IKKabupatenKota extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $table = 'ik_kabupaten_kotas';
    protected $dates = [
        'deleted_at'
    ];
    protected $fillable = [
        'label',
        'description',
    ];
}
