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
                'id' => 1,
                'title' => 'user_management_access',
            ],
            [
                'id' => 2,
                'title' => 'permission_create',
            ],
            [
                'id' => 3,
                'title' => 'permission_edit',
            ],
            [
                'id' => 4,
                'title' => 'permission_show',
            ],
            [
                'id' => 5,
                'title' => 'permission_delete',
            ],
            [
                'id' => 6,
                'title' => 'permission_access',
            ],
            [
                'id' => 7,
                'title' => 'role_create',
            ],
            [
                'id' => 8,
                'title' => 'role_edit',
            ],
            [
                'id' => 9,
                'title' => 'role_show',
            ],
            [
                'id' => 10,
                'title' => 'role_delete',
            ],
            [
                'id' => 11,
                'title' => 'role_access',
            ],
            [
                'id' => 12,
                'title' => 'user_create',
            ],
            [
                'id' => 13,
                'title' => 'user_edit',
            ],
            [
                'id' => 14,
                'title' => 'user_show',
            ],
            [
                'id' => 15,
                'title' => 'user_delete',
            ],
            [
                'id' => 16,
                'title' => 'user_access',
            ],
            [
                'id' => 17,
                'title' => 'content_management_access',
            ],
            [
                'id' => 18,
                'title' => 'content_category_create',
            ],
            [
                'id' => 19,
                'title' => 'content_category_edit',
            ],
            [
                'id' => 20,
                'title' => 'content_category_show',
            ],
            [
                'id' => 21,
                'title' => 'content_category_delete',
            ],
            [
                'id' => 22,
                'title' => 'content_category_access',
            ],
            [
                'id' => 23,
                'title' => 'content_tag_create',
            ],
            [
                'id' => 24,
                'title' => 'content_tag_edit',
            ],
            [
                'id' => 25,
                'title' => 'content_tag_show',
            ],
            [
                'id' => 26,
                'title' => 'content_tag_delete',
            ],
            [
                'id' => 27,
                'title' => 'content_tag_access',
            ],
            [
                'id' => 28,
                'title' => 'content_page_create',
            ],
            [
                'id' => 29,
                'title' => 'content_page_edit',
            ],
            [
                'id' => 30,
                'title' => 'content_page_show',
            ],
            [
                'id' => 31,
                'title' => 'content_page_delete',
            ],
            [
                'id' => 32,
                'title' => 'content_page_access',
            ],
            [
                'id' => 33,
                'title' => 'inalto_access',
            ],
            [
                'id' => 34,
                'title' => 'reports_category_create',
            ],
            [
                'id' => 35,
                'title' => 'reports_category_edit',
            ],
            [
                'id' => 36,
                'title' => 'reports_category_show',
            ],
            [
                'id' => 37,
                'title' => 'reports_category_delete',
            ],
            [
                'id' => 38,
                'title' => 'reports_category_access',
            ],
            [
                'id' => 39,
                'title' => 'reports_tag_create',
            ],
            [
                'id' => 40,
                'title' => 'reports_tag_edit',
            ],
            [
                'id' => 41,
                'title' => 'reports_tag_show',
            ],
            [
                'id' => 42,
                'title' => 'reports_tag_delete',
            ],
            [
                'id' => 43,
                'title' => 'reports_tag_access',
            ],
            [
                'id' => 44,
                'title' => 'report_create',
            ],
            [
                'id' => 45,
                'title' => 'report_edit',
            ],
            [
                'id' => 46,
                'title' => 'report_show',
            ],
            [
                'id' => 47,
                'title' => 'report_delete',
            ],
            [
                'id' => 48,
                'title' => 'report_access',
            ],
            [
                'id' => 49,
                'title' => 'news_access',
            ],
            [
                'id' => 50,
                'title' => 'news_tag_create',
            ],
            [
                'id' => 51,
                'title' => 'news_tag_edit',
            ],
            [
                'id' => 52,
                'title' => 'news_tag_show',
            ],
            [
                'id' => 53,
                'title' => 'news_tag_delete',
            ],
            [
                'id' => 54,
                'title' => 'news_tag_access',
            ],
            [
                'id' => 55,
                'title' => 'news_category_create',
            ],
            [
                'id' => 56,
                'title' => 'news_category_edit',
            ],
            [
                'id' => 57,
                'title' => 'news_category_show',
            ],
            [
                'id' => 58,
                'title' => 'news_category_delete',
            ],
            [
                'id' => 59,
                'title' => 'news_category_access',
            ],
            [
                'id' => 60,
                'title' => 'news_post_create',
            ],
            [
                'id' => 61,
                'title' => 'news_post_edit',
            ],
            [
                'id' => 62,
                'title' => 'news_post_show',
            ],
            [
                'id' => 63,
                'title' => 'news_post_delete',
            ],
            [
                'id' => 64,
                'title' => 'news_post_access',
            ],
            [
                'id' => 65,
                'title' => 'poi_create',
            ],
            [
                'id' => 66,
                'title' => 'poi_edit',
            ],
            [
                'id' => 67,
                'title' => 'poi_show',
            ],
            [
                'id' => 68,
                'title' => 'poi_delete',
            ],
            [
                'id' => 69,
                'title' => 'poi_access',
            ],
            [
                'id' => 70,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
