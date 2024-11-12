<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property mixed $childs
 * @method static where(string $string, string $string1, $type)
 * @method static find($id)
 */
class Category extends Model
{
    protected $fillable = ['name', 'slug', 'icon', 'parent_id', 'description', 'type'];
    public static function boot(): void
    {
        // Trước khi xóa 1 category sẽ xóa các category con
        parent::boot();
        static::deleting(function($category){
            $category->deleteChildren();
        });
    }

    // Trả về danh sách các danh mục con của danh mục hiện tại
    public function childs():HasMany{
        return $this->hasMany(Category::class, "parent_id",'id');
    }

    // Trả về thông tin danh mục cha
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    // Xóa toàn bộ danh mục con
    public function deleteChildren(): void
    {
        foreach ($this->childs as $child){
            $child->deleteChildren();
            $child->delete();
        }
    }

}
