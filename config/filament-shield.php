<?php

return [
     'shield_resource' => [
          'slug' => 'roles',
          'navigation_sort' => 2,
          'navigation_badge' => false,
          'navigation_group' => true,
     ],

     'auth_provider_model' => [
          'fqcn' => 'App\\Models\\User'
     ],

     'super_admin' => [
          'enabled' => true,
          'name'  => 'super_admin'
     ],

     'filament_user' => [
          'enabled' => true,
          'name' => 'filament_user'
     ],

     'permission_prefixes' => [
          'resource' => [
               'view',
               'view_any',
               'create',
               'update',
               // 'restore',
               // 'restore_any',
               // 'replicate',
               // 'reorder',
               // 'delete',
               // 'delete_any',
               // 'force_delete',
               // 'force_delete_any',
          ],

          'page' => 'page',
          'widget' => 'widget',
     ],

     'entities' => [
          'pages' => true,
          'widgets' => true,
          'resources' => true,
          'custom_permissions' => false,
     ],

     'generator' => [
          'option' => 'policies_and_permissions'
     ],

     'exclude' => [
          'enabled' => true,

          'pages' => [
               'Dashboard',
          ],

          'widgets' => [
               'AccountWidget', 'FilamentInfoWidget',
          ],

          'resources' => [],
     ],

     'register_role_policy' => [
          'enabled' => false
     ],
];
