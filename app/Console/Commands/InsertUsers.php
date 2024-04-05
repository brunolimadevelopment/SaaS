<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InsertUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:insert-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert admin and tenants users in tables';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tenant1 = new \App\Models\Tenant;
        $tenant1->name = 'Loja 01';
        $tenant1->save();

        $tenant2 = new \App\Models\Tenant;
        $tenant2->name = 'Loja 02';
        $tenant2->save();

        $user1 = new \App\Models\User;
        $user1->name = 'Bruno Lima';
        $user1->email = 'brunolimadevelopment@gmail.com';
        $user1->email_verified_at = now();
        $user1->password = bcrypt('secret');
        $user1->remember_token = \Illuminate\Support\Str::random(10);
        $user1->save();

        $user2 = new \App\Models\User;
        $user2->tenant_id = $tenant1->id;
        $user2->name = 'Usuário Teste 01';
        $user2->email = 'userteste01@gmail.com';
        $user2->email_verified_at = now();
        $user2->password = bcrypt('secret');
        $user2->remember_token = \Illuminate\Support\Str::random(10);
        $user2->save();

        $user3 = new \App\Models\User;
        $user3->tenant_id = $tenant2->id;
        $user3->name = 'Usuário Teste 02';
        $user3->email = 'userteste02@gmail.com';
        $user3->email_verified_at = now();
        $user3->password = bcrypt('secret');
        $user3->remember_token = \Illuminate\Support\Str::random(10);
        $user3->save();

        $this->info('Script executado com sucesso!');
    }
}
