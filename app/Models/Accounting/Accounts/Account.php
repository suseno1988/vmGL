<?php

namespace App\Models\Accounting\Accounts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Account extends Model
{
    use HasFactory;
    protected $guarded = [];

    const STATUSES = [
        'active' => "{{ __('global.active') }}",
        'suspend' => "{{ __('global.non_active') }}",
    ];

    const IS_JURNAL = [
        'yes' => "{{ __('account.yes') }}",
        'no' => "{{ __('account.no') }}",
    ];
    
    const ACCOUNT_TYPE = [
        1 => "{{ __('account.cb_account') }}",
        2 => "{{ __('account.ar_account') }}",
        3 => "{{ __('account.ot_ar_account') }}",
        4 => "{{ __('account.in_account') }}",
        5 => "{{ __('account.wip_account') }}",
        6 => "{{ __('account.oca_account') }}",
        7 => "{{ __('account.fa_account') }}",
        8 => "{{ __('account.ad_account') }}",
        9 => "{{ __('account.ap_account') }}",
        10 => "{{ __('account.ot_ap_account') }}",
        11 => "{{ __('account.tax_account') }}",
        12 => "{{ __('account.pp_account') }}",
        13 => "{{ __('account.ot_cl_account') }}",
        14 => "{{ __('account.lt_account') }}",
        15 => "{{ __('account.eq_account') }}",
        16 => "{{ __('account.rev_account') }}",
        17 => "{{ __('account.cosg_account') }}",
        18 => "{{ __('account.exp_account') }}",
        19 => "{{ __('account.oth_inc_account') }}",
        20 => "{{ __('account.oth_exp_account') }}",
    ];

    public function getAccountNoAttribute($value)
    {
        return ucfirst($value);
    }

    public function getAccountNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getAccountFullAttribute()
    {
        return ucfirst($this->account_no) . " - " . ucfirst($this->account_name);
    }

    public function setAccountNoAttribute($value)
    {
        $this->attributes['account_no'] = ucfirst($value);
    }

    public function setAccountNameAttribute($value)
    {
        $this->attributes['account_name'] = ucfirst($value);
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->created_by = Auth::id();
        });
        static::updating(function ($model) {
            $model->updated_by = Auth::id();
        });
    }
}
