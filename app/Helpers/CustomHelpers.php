<?php

    if (!function_exists('checkTenantId')) {
        function checkTenantId() {
            /**
             * Se na sessão tiver um tenant e a sessão não tiver vazia
             * depois que a pessoa loga, retorna true.
             */

            return session()->has('tenant_id') && !is_null(session('tenant_id'));

        }
    }
