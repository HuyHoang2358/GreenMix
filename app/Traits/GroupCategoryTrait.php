<?php
namespace App\Traits;

use App\Models\Category;

trait GroupCategoryTrait
{
    protected function getGroupName($group): string
    {
        return match ($group) {
            'post' => 'Danh mục bài viết',
            'news' => 'Danh mục truyền thông',
            'knowledge' => 'Danh mục kiến thức',
            'recruitment' => 'Vị trí tuyển dụng',
            default => '',
        };

    }
    // Phương thức lấy danh sách các danh mục theo type và có parent_id là 0

    protected function getCategories($type, $ignoreIds = []){
        return Category::where('type', '=', $type)
            ->whereNotIn('id', $ignoreIds)
            ->where('parent_id', '=', 0)
            ->with('childs')
            ->get();
    }
}
