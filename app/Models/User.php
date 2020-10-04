<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function networks()
    {
        return $this->hasMany(Network::class);
    }

    public static function registerByNetwork(string $network, string $identity)
    {
        $user = static::create([
            'name' => $identity,
            'email' => null,
            'password' => null,
            'verify_token' => null,
        ]);
        $user->networks()->create([
            'network' => $network,
            'identity' => $identity,
        ]);

        return $user;
    }

    public function scopeByNetwork(
        Builder $query,
        string $network,
        string $identity
    ) {
        return $query->whereHas('networks',
            function (Builder $query) use ($network, $identity) {
                $query->where('network', $network)->where('identity',
                    $identity);
            });
    }
}
