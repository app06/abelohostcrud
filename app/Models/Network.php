<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $user_id
 * @property string $network
 * @property string $identity
 */
class Network extends Model
{
    protected $table = 'user_networks';

    protected $fillable = ['network', 'identity'];
}
