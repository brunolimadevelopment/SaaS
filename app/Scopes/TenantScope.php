<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class TenantScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {

        /**
         * Verifica se existe um tenant logado com o helper CustomHelpers.php
         * se quiser adicionar ou tirar algo, muda só no helper.
         */
        if(checkTenantId()) {
            $builder->where('tenant_id', session('tenant_id'));
        }
    }
}
