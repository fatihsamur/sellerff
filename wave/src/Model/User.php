<?php

namespace Wave\Model;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Lab404\Impersonate\Models\Impersonate;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Wave\Model\Plan;
use Wave\Model\PaddleSubscription;
use Illuminate\Database\Eloquent\Model;
use \Storage;
use Wave\Model\Announcement;
use Wave\Model\ApiToken;
use App\Model\Order;
use App\Model\Deposit;

class User extends \TCG\Voyager\Models\User implements JWTSubject
{
    use Notifiable, Impersonate;


    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    'password', 'remember_token',
  ];


    public function keyValues()
    {
        return $this->morphMany('Wave\KeyValue', 'keyvalue');
    }

    public function keyValue($key)
    {
        return $this->morphMany('Wave\KeyValue', 'keyvalue')->where('key', '=', $key)->first();
    }

    public function profile($key)
    {
        $keyValue = $this->keyValue($key);
        return isset($keyValue->value) ? $keyValue->value : '';
    }

    public function onTrial()
    {
        if (is_null($this->trial_ends_at)) {
            return false;
        }
        return true;
    }

    public function subscribed($plan)
    {
        $plan = Plan::where('slug', $plan)->first();

        // if the user is an admin they automatically have access to the default plan
        if (isset($plan->default) && $plan->default && $this->hasRole('admin')) {
            return true;
        }

        if (isset($plan->slug) && $this->hasRole($plan->slug)) {
            return true;
        }

        return false;
    }

    public function subscriber()
    {
        if ($this->hasRole('admin')) {
            return true;
        }

        $roles = $this->roles->pluck('id')->push($this->role_id)->unique();
        $plans = Plan::whereIn('role_id', $roles)->count();

        // If the user has a role that belongs to a plan
        if ($plans) {
            return true;
        }

        return false;
    }

    public function subscription()
    {
        //return $this->hasOne(PaddleSubscription::class);
        return $this->hasOne(Plan::class, 'role_id', 'role_id');
    }

    public function isAdmin()
    {
        if ($this->hasRole('admin')) {
            return true;
        }
        return false;
    }


    /**
     * @return bool
     */
    public function canImpersonate()
    {
        // If user is admin they can impersonate
        return $this->hasRole('admin');
    }

    /**
     * @return bool
     */
    public function canBeImpersonated()
    {
        // Any user that is not an admin can be impersonated
        return !$this->hasRole('admin');
    }

    public function hasAnnouncements()
    {
        // Get the latest Announcement
        $latest_announcement = Announcement::orderBy('created_at', 'DESC')->first();

        if (!$latest_announcement) {
            return false;
        }
        return !$this->announcements->contains($latest_announcement->id);
    }

    public function announcements()
    {
        return $this->belongsToMany('Wave\Announcement');
    }

    public function createApiKey($name)
    {
        return ApiKey::create(['user_id' => $this->id, 'name' => $name, 'key' => str_random(60)]);
    }

    public function apiKeys()
    {
        return $this->hasMany('Wave\ApiKey')->orderBy('created_at', 'DESC');
    }

    public function daysLeftOnTrial()
    {
        if ($this->trial_ends_at && $this->trial_ends_at >= now()) {
            $trial_ends = Carbon::parse($this->trial_ends_at)->addDay();
            return $trial_ends->diffInDays(now());
        }
        return 0;
    }

    public function avatar()
    {
        return Storage::url($this->avatar);
    }

    public function isPrime()
    {
        return $this->hasRole('prime');
    }
    public function isEmployee()
    {
        return $this->hasRole('employee');
    }
    public function isCustomer()
    {
        return $this->hasRole('customer');
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }
    public function user_activity()
    {
        return $this->hasMany('App\Model\UserActivity');
    }

    public function getCancelUrlAttribute()
    {
        return route('user.cancel-subscription', $this->id);
    }

    public function billing_address()
    {
        if ($this->billing_line1 && $this->billing_line2 && $this->billing_city && $this->billing_state && $this->billing_zip_code && $this->billing_phone_number) {
            return [
                'line1' => $this->billing_line1,
                'line2' => $this->billing_line2,
                'city' => $this->billing_city,
                'state' => $this->billing_state,
                'zip_code' => $this->billing_zip_code,
                'phone_number' => $this->billing_phone_number,
            ];
        }
        return [
            'line1' => $this->line1,
            'line2' => $this->line2,
            'city' => $this->city,
            'state' => $this->state,
            'zip_code' => $this->zip_code,
            'phone_number' => $this->phone_number,
        ];
    }

    public function affiliates()
    {
        return $this->hasMany('App\Model\Affiliate');
    }
    public function tickets()
    {
        return $this->hasMany('App\Model\Ticket');
    }
}
