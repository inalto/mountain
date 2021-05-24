<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'content_management_access',
            ],
            [
                'id'    => 18,
                'title' => 'content_category_create',
            ],
            [
                'id'    => 19,
                'title' => 'content_category_edit',
            ],
            [
                'id'    => 20,
                'title' => 'content_category_show',
            ],
            [
                'id'    => 21,
                'title' => 'content_category_delete',
            ],
            [
                'id'    => 22,
                'title' => 'content_category_access',
            ],
            [
                'id'    => 23,
                'title' => 'content_tag_create',
            ],
            [
                'id'    => 24,
                'title' => 'content_tag_edit',
            ],
            [
                'id'    => 25,
                'title' => 'content_tag_show',
            ],
            [
                'id'    => 26,
                'title' => 'content_tag_delete',
            ],
            [
                'id'    => 27,
                'title' => 'content_tag_access',
            ],
            [
                'id'    => 28,
                'title' => 'content_page_create',
            ],
            [
                'id'    => 29,
                'title' => 'content_page_edit',
            ],
            [
                'id'    => 30,
                'title' => 'content_page_show',
            ],
            [
                'id'    => 31,
                'title' => 'content_page_delete',
            ],
            [
                'id'    => 32,
                'title' => 'content_page_access',
            ],
            [
                'id'    => 33,
                'title' => 'inalto_access',
            ],
            [
                'id'    => 34,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 35,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 36,
                'title' => 'report_create',
            ],
            [
                'id'    => 37,
                'title' => 'report_edit',
            ],
            [
                'id'    => 38,
                'title' => 'report_show',
            ],
            [
                'id'    => 39,
                'title' => 'report_delete',
            ],
            [
                'id'    => 40,
                'title' => 'report_access',
            ],
            [
                'id'    => 41,
                'title' => 'tag_create',
            ],
            [
                'id'    => 42,
                'title' => 'tag_edit',
            ],
            [
                'id'    => 43,
                'title' => 'tag_show',
            ],
            [
                'id'    => 44,
                'title' => 'tag_delete',
            ],
            [
                'id'    => 45,
                'title' => 'tag_access',
            ],
            [
                'id'    => 46,
                'title' => 'poi_create',
            ],
            [
                'id'    => 47,
                'title' => 'poi_edit',
            ],
            [
                'id'    => 48,
                'title' => 'poi_show',
            ],
            [
                'id'    => 49,
                'title' => 'poi_delete',
            ],
            [
                'id'    => 50,
                'title' => 'poi_access',
            ],
            [
                'id'    => 51,
                'title' => 'category_create',
            ],
            [
                'id'    => 52,
                'title' => 'category_edit',
            ],
            [
                'id'    => 53,
                'title' => 'category_show',
            ],
            [
                'id'    => 54,
                'title' => 'category_delete',
            ],
            [
                'id'    => 55,
                'title' => 'category_access',
            ],
            [
                'id'    => 56,
                'title' => 'news_access',
            ],
            [
                'id'    => 57,
                'title' => 'post_create',
            ],
            [
                'id'    => 58,
                'title' => 'post_edit',
            ],
            [
                'id'    => 59,
                'title' => 'post_show',
            ],
            [
                'id'    => 60,
                'title' => 'post_delete',
            ],
            [
                'id'    => 61,
                'title' => 'post_access',
            ],
            [
                'id'    => 62,
                'title' => 'news_tag_create',
            ],
            [
                'id'    => 63,
                'title' => 'news_tag_edit',
            ],
            [
                'id'    => 64,
                'title' => 'news_tag_show',
            ],
            [
                'id'    => 65,
                'title' => 'news_tag_delete',
            ],
            [
                'id'    => 66,
                'title' => 'news_tag_access',
            ],
            [
                'id'    => 67,
                'title' => 'news_category_create',
            ],
            [
                'id'    => 68,
                'title' => 'news_category_edit',
            ],
            [
                'id'    => 69,
                'title' => 'news_category_show',
            ],
            [
                'id'    => 70,
                'title' => 'news_category_delete',
            ],
            [
                'id'    => 71,
                'title' => 'news_category_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
