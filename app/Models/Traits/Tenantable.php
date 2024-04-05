<?php

namespace App\Models\Traits;

use App\Models\Tenant;
use App\Scopes\TenantScope;

trait Tenantable
{
    protected static function bootTenantable()
    {
        /**
         * funciona em qualquer parte da aplicação
         */

        static::addGlobalScope(new TenantScope);

        /**
         * Quando for criar um registro ele automaticamente adiciona o tenant_id.
         * Quando for criar um usuario ele vai ser especifico para o tenant especifico para que o outro tenant não enxergue.
         * Pra não ter que ficar inserindo o tenant na mão.
         */
        if(checkTenantId()) {

            /**
             * toda vez que é feito um insert no banco o método static do laravel
             * a variavel $model ja é uma estancia antes de salvar
             */
            static::creating(function($model) {
                $model->tenant_id = session('tenant_id');
            });
        }

    }


    /**
     * relacionameto para ver qual o tenant que pertence
     */
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
