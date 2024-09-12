<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $collection = collect([
            'NIR',
            'Base Samu',
            'Motorista/Medico',
            'Role',
            'Permission'
        ]);

        $collection->each(function ($item, $key) {
            // create permissions for each collection item
            Permission::create(['group' => $item, 'name' => 'viewAny' . $item]);
            Permission::create(['group' => $item, 'name' => 'view' . $item]);
            Permission::create(['group' => $item, 'name' => 'update' . $item]);
            Permission::create(['group' => $item, 'name' => 'create' . $item]);
            Permission::create(['group' => $item, 'name' => 'delete' . $item]);
            Permission::create(['group' => $item, 'name' => 'destroy' . $item]);
        });

        // Create a Super-Admin Role and assign all Permissions
        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());



        $roleNir = Role::firstOrCreate(
            ['name' => 'NIR'],
            ['guard_name' => 'web']
        );
        $roleNir->givePermissionTo('viewAnyNIR', 'viewNIR', 'updateNIR', 'createNIR', 'deleteNIR', 'destroyNIR');

        $roleBaseSamu = Role::firstOrCreate(
            ['name' => 'Base Samu'],
            ['guard_name' => 'web']
        );
        $roleBaseSamu->givePermissionTo('viewAnyBase Samu', 'viewBase Samu', 'updateBase Samu', 'createBase Samu', 'deleteBase Samu', 'destroyBase Samu');

        $roleMM = Role::firstOrCreate(
            ['name' => 'Motorista/Medico'],
            ['guard_name' => 'web']
        );
        $roleMM->givePermissionTo('viewAnyMotorista/Medico', 'viewMotorista/Medico', 'updateMotorista/Medico', 'createMotorista/Medico', 'deleteMotorista/Medico', 'destroyMotorista/Medico');

        // Give User Super-Admin Role
        // $user = \App\Models\User::where('email', 'your@email.com')->first(); // Change this to your email.
        // $user->assignRole('super-admin');
    }
}
