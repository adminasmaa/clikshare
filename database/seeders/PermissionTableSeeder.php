<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions_id = [
            'View Dashboard',
            'Products Management',
            'Orders Management',
            'Financial Management',
            'Users Management',
            'Roles Management',
            'Inventory Management',
            'Report Management',
            'Settings Management',
            'Payment Methods Management',
            'Categories Management',
        ];
        $Products_permissions = [
           'View All Products',
           'Add Product',
           'View Product',
           'Edit Product',
           'Delete Product',
           'Add Up-sell Product',
           'Add Cross-sell Product',
           'Add Gift Product',
        ];
        $Orders_permissions = [
           'Add Order',
           'View Order',
           'Edit Order',
           'Delete Order',
           'Add Up-sell Order',
           'Add Cross-sell Order',
           'Add Gift Order'
        ];
        $Financial_permissions = [
           'View Fianancial'
        ];
        $Users_permissions = [
           'Add User',
           'View User',
           'Edit User',
           'Delete User'
        ];
        $Roles_permissions = [
            'View Members',
            'Add Role',
            'View Role',
            'Edit Role',
            'Delete Role'
        ];
        $Inventory_permissions = [
            'View All Inventory',
            'View Single Product',
        ];
        $Reports_permissions = [
            'View All Reports',
        ];
        $Payment_Methods_permissions = [
            'Add Payment Method',
            'View Payment Method',
            'Edit Payment Method',
            'Delete Payment Method'
        ];
        $categories_permissions = [
            'Add Category',
            'View Category',
            'Edit Category',
            'Delete Category'
        ];

        foreach ($permissions_id as $permissio) {
            Permission::create(['name' => $permissio]);
        }
        foreach ($Products_permissions as $permissi) {
             Permission::create(['name' => $permissi, 'organization_id' => 2]);
        }
        foreach ($Orders_permissions as $permiss) {
            Permission::create(['name' => $permiss, 'organization_id' => 3]);
        }
        foreach ($Financial_permissions as $permis) {
            Permission::create(['name' => $permis, 'organization_id' => 4]);
        }
        foreach ($Users_permissions as $permi) {
            Permission::create(['name' => $permi, 'organization_id' => 5]);
        }
        foreach ($Roles_permissions as $perm) {
            Permission::create(['name' => $perm, 'organization_id' => 6]);
        }
        foreach ($Inventory_permissions as $per) {
            Permission::create(['name' => $per, 'organization_id' => 7]);
        }
        foreach ($Reports_permissions as $pe) {
            Permission::create(['name' => $pe, 'organization_id' => 8]);
        }
        foreach ($Payment_Methods_permissions as $pr) {
            Permission::create(['name' => $pr, 'organization_id' => 10]);
        }
        foreach ($categories_permissions as $p) {
            Permission::create(['name' => $p, 'organization_id' => 11]);
        }
    }
}
