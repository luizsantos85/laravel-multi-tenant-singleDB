<?php

namespace App\Observers\Tenant;

use App\Tenant\ManagerTenant;
use Illuminate\Database\Eloquent\Model;

class TenantObserver
{
    public function creating(Model $model) //pega o modelo do usuário
    {
        $tenant = app(ManagerTenant::class)->getTenantIdentify();
        $model->setAttribute('tenant_id',$tenant);
    }
}