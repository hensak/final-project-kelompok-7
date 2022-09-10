<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    // DEFAULT NAMA TABEL YG DIPILIH ADALAH profiles
    // KALO NAMA TABEL DI DB SUDAH SESUAI (aturan plural bhs inggris)
    // MAKA TAK PERLU DEKLARASI VARIABLE protected $table
    protected $guarded = ['id', 'user_id'];

    /**
     * Get the user that owns the model.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
