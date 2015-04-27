<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\Role;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password', 'sso'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    /**
     * @return mixed
     */
    public function getRole() {
        $role = Role::where('sso', '=', $this->sso)->firstOrFail();
        return $role->user_role;
    }

    /**
     * @return bool
     */
    public function isApplicant() {
        if ($this->getRole() == "applicant") {
            return true;
        }
        return false;
    }


    /**
     * @return bool
     */
    public function isInstructor() {
        if ($this->getRole() == "instructor") {
            return true;
        }
        return false;
    }


    /**
     * @return bool
     */
    public function isAdmin() {
        if ($this->getRole() == "admin") {
            return true;
        }
        return false;
    }

}
