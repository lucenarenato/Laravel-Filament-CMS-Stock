<?php

namespace Database\Seeders;

use App\Models\Organization;
use App\Models\User;
use App\Models\UserOrganization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = User::all()->count();

        if ($count == 0) {

            $organization = Organization::create([
                'name' => 'AINDA MarketPlace',
                'company_size' => 50,
                'website' => 'https://xsensors.ai',
                'zip_code' => '71570',
                'street_adress' => 'Fabrikstr.12',
                'country' => 'Germany',
                'city' => 'Oppenweiler',
                'email1' => 'info@xsensors.ai',
                'email2' => '',
                'fax' => '+49 7191-73509-200',
                'fone1' => '+49 7191 73509-0',
                'fone2' => '',
                'other' => '',
                'status_active' => 1,
            ]);

            $organization = Organization::create([
                'name' => 'AINDA Test Account',
                'company_size' => 50,
                'website' => 'https://xsensors.ai',
                'zip_code' => '71570',
                'street_adress' => 'Fabrikstr.12',
                'country' => 'Germany',
                'city' => 'Oppenweiler',
                'email1' => 'r.lima@xsensors.ai',
                'email2' => '',
                'fax' => '+49 7191-73509-200',
                'fone1' => '+49 7191 73509-0',
                'fone2' => '',
                'other' => '',
                'status_active' => 1,
            ]);

            $user = User::create([
                'first_name' => 'Rafael',
                'last_name' => 'Lima',
                'email' => 'r.lima@xsensors.ai',
                'organization_id_logged' => $organization->id,
                'organization_id' => $organization->id,
                'password' => bcrypt('123456'),
                'permission' => 1,
            ]);
           
            $userOrganization = UserOrganization::create([
                'user_id' => $user->id,
                'role_id' => 4,
                'organization_id' => $user->organization_id,
            ]);

           
            $user = User::create([
                'first_name' => 'Renan',
                'last_name' => 'Toesqui',
                'email' => 'r.toesqui@xsensors.ai',
                'organization_id_logged' => $organization->id,
                'organization_id' => $organization->id,
                'password' => bcrypt(Str::random(15)),
                'permission' => 1,
            ]);

            $userOrganization = UserOrganization::create([
                'user_id' => $user->id,
                'role_id' => 4,
                'organization_id' => $user->organization_id,
            ]);

            // Backend Team

            $user = User::create([
                'first_name' => 'Walfran',
                'last_name' => 'Paiva',
                'email' => 'w.aquino@xsensors.ai',
                'organization_id_logged' => $organization->id,
                'organization_id' => $organization->id,
                'password' => bcrypt('@Wal123XS1'),
                'permission' => 1,
            ]);

            $userOrganization = UserOrganization::create([
                'user_id' => $user->id,
                'role_id' => 4,
                'organization_id' => $user->organization_id,
            ]);

            $user = User::create([
                'first_name' => 'Flavia',
                'last_name' => 'Teles',
                'email' => 'f.teles@xsensors.ai',
                'organization_id_logged' => $organization->id,
                'organization_id' => $organization->id,
                'password' => bcrypt('Fts00001'),
                'permission' => 1,
            ]);

            $userOrganization = UserOrganization::create([
                'user_id' => $user->id,
                'role_id' => 5,
                'organization_id' => $user->organization_id,
            ]);

            $user = User::create([
                'first_name' => 'Renato',
                'last_name' => 'Lucena',
                'email' => 'r.lucena@xsensors.ai',
                'organization_id_logged' => $organization->id,
                'organization_id' => $organization->id,
                'password' => bcrypt(Str::random(15)),
                'permission' => 1,
            ]);

            $userOrganization = UserOrganization::create([
                'user_id' => $user->id,
                'role_id' => 5,
                'organization_id' => $user->organization_id,
            ]);

            // UI/UX Team

            $user = User::create([
                'first_name' => 'Marcela',
                'last_name' => 'Pinheiro',
                'email' => 'm.baptista@xsensors.ai',
                'organization_id_logged' => $organization->id,
                'organization_id' => $organization->id,
                'password' => bcrypt(Str::random(15))
            ]);

            $userOrganization = UserOrganization::create([
                'user_id' => $user->id,
                'role_id' => 7,
                'organization_id' => $user->organization_id,
            ]);

            $user = User::create([
                'first_name' => 'Luis',
                'last_name' => 'Fernando',
                'email' => 'l.castro@xsensors.ai',
                'organization_id_logged' => $organization->id,
                'organization_id' => $organization->id,
                'password' => bcrypt(Str::random(15))
            ]);

            $userOrganization = UserOrganization::create([
                'user_id' => $user->id,
                'role_id' => 7,
                'organization_id' => $user->organization_id,
            ]);

            // Frontend Team

            $user = User::create([
                'first_name' => 'Ângelo',
                'last_name' => 'Patricio',
                'email' => 'a.silveira@xsensors.ai',
                'organization_id_logged' => $organization->id,
                'organization_id' => $organization->id,
                'password' => bcrypt(Str::random(15)),
                'permission' => 1,
            ]);

            $userOrganization = UserOrganization::create([
                'user_id' => $user->id,
                'role_id' => 4,
                'organization_id' => $user->organization_id,
            ]);

            $user = User::create([
                'first_name' => 'Daniel',
                'last_name' => 'Soares',
                'email' => 'd.soares@xsensors.ai',
                'organization_id_logged' => $organization->id,
                'organization_id' => $organization->id,
                'password' => bcrypt(Str::random(15))
            ]);

            $userOrganization = UserOrganization::create([
                'user_id' => $user->id,
                'role_id' => 4,
                'organization_id' => $user->organization_id,
            ]);

            $user = User::create([
                'first_name' => 'Fernando',
                'last_name' => 'Severino Almeida',
                'email' => 'f.almeida@xsensors.ai',
                'organization_id_logged' => $organization->id,
                'organization_id' => $organization->id,
                'password' => bcrypt(Str::random(15))
            ]);

            $userOrganization = UserOrganization::create([
                'user_id' => $user->id,
                'role_id' => 4,
                'organization_id' => $user->organization_id,
            ]);

            $user = User::create([
                'first_name' => 'Luis',
                'last_name' => 'Bueno',
                'email' => 'l.bueno@xsensors.ai',
                'organization_id_logged' => $organization->id,
                'organization_id' => $organization->id,
                'password' => bcrypt(Str::random(15))
            ]);

            $userOrganization = UserOrganization::create([
                'user_id' => $user->id,
                'role_id' => 4,
                'organization_id' => $user->organization_id,
            ]);

            $user = User::create([
                'first_name' => 'Alexandre',
                'last_name' => 'Preczewski',
                'email' => 'a.preczewski@xsensors.ai',
                'organization_id_logged' => $organization->id,
                'organization_id' => $organization->id,
                'password' => bcrypt(Str::random(15))
            ]);

            $userOrganization = UserOrganization::create([
                'user_id' => $user->id,
                'role_id' => 4,
                'organization_id' => $user->organization_id,
            ]);

            $user = User::create([
                'first_name' => 'Lucas',
                'last_name' => 'Dallier Arraes',
                'email' => 'l.dallier@xsensors.ai',
                'organization_id_logged' => $organization->id,
                'organization_id' => $organization->id,
                'password' => bcrypt(Str::random(15))
            ]);

            $userOrganization = UserOrganization::create([
                'user_id' => $user->id,
                'role_id' => 4,
                'organization_id' => $user->organization_id,
            ]);

            $user = User::create([
                'first_name' => 'Thiago',
                'last_name' => 'Felipe',
                'email' => 't.felipe@xsensors.ai',
                'organization_id_logged' => $organization->id,
                'organization_id' => $organization->id,
                'password' => bcrypt(Str::random(15))
            ]);

            $userOrganization = UserOrganization::create([
                'user_id' => $user->id,
                'role_id' => 4,
                'organization_id' => $user->organization_id,
            ]);

            $user = User::create([
                'first_name' => 'Luis',
                'last_name' => 'Felipe',
                'email' => 'l.silva@xsensors.ai',
                'organization_id_logged' => $organization->id,
                'organization_id' => $organization->id,
                'password' => bcrypt(Str::random(15))
            ]);

            $userOrganization = UserOrganization::create([
                'user_id' => $user->id,
                'role_id' => 4,
                'organization_id' => $user->organization_id,
            ]);

            $user = User::create([
                'first_name' => 'Ramon',
                'last_name' => 'Peres',
                'email' => 'r.peres@xsensors.ai',
                'organization_id_logged' => $organization->id,
                'organization_id' => $organization->id,
                'password' => bcrypt(Str::random(15))
            ]);

            $userOrganization = UserOrganization::create([
                'user_id' => $user->id,
                'role_id' => 4,
                'organization_id' => $user->organization_id,
            ]);

        } else {
            echo "Qtde: " . $count . " Records Inside Database!";
        }
    }
}
