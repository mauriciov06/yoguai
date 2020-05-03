<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'tipo_cuenta', 'avatar', 'email' , 'direccion' , 'tele_movil', 'id_ciudad' , 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    //Se crea un mutador para modificar elementos antes de ser guardados.
    public function setAvatarAttribute($avatar){
        if(!empty($avatar && $avatar != 'default-avatar.png')){
            $name = Carbon::now()->second.$avatar->getClientOriginalName();
            $this->attributes['avatar'] = $name;
            \Storage::disk('local')->put($name, \File::get($avatar));
        }else{
            $this->attributes['avatar'] = 'default-avatar.png';
        }
        
    }

    public function setPasswordAttribute($valor){
        if(!empty($valor)){
            $this->attributes['password'] = bcrypt($valor);
        }
    }

    public function scopeBusquedaUsuario($query, $name, $correo, $ciudad){
      if(trim($name) != ''){
        return $query->where('name', 'LIKE', "%$name%");
      }elseif(trim($correo) != ''){
        if(filter_var($correo, FILTER_VALIDATE_EMAIL)){
          return $query->where('email', $correo);
        }
      }elseif($ciudad != ''){
        return $query->where('id_ciudad', $ciudad);
      }
    }
}
