<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kucing extends Model
{
    use HasFactory;

    protected $table = 'tb_kucing';

    protected $primaryKey = 'kode_kucing';

    protected $fillable = [
        'id_kucing',
        'nama_kucing',
        'jenis_kelamin',
        'ras_kucing',
        'berat_badan',
        'status_kesehatan',
        'foto_kucing',
    ];

    public function getFotoKucingAttribute($value)
    {
        return $value ? asset('storage/images/' . $value) : null;
    }
}
