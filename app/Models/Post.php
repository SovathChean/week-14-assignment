<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;

class Post extends Model
{
    //
    /**
    *@SWG\Definition(
    * definition="Post",
    * required={"lable", {"name", "category_id", "creator_id"}},
    *  @SWG\Property(
    *     property="id",
    *     description="id",
    *     type="integer",
    *     format="int64"
    *   ),
    *  @SWG\Property(
    *     property="name",
    *     description="name",
    *     type="string",
    *     format="int64"
    *   ),
    *  @SWG\Property(
    *     property="category_id",
    *     description="id",
    *     type="integer",
    *     format="int64"
    *   ),
    *  @SWG\Property(
    *     property="creator_id",
    *     description="id",
    *     type="integer",
    *     format="int64"
    *   ),
    *  @SWG\Property(
    *     property="created_at",
    *     description="created_at",
    *     type="string",
    *     format="date-time"
    *   ),
    *  @SWG\Property(
    *     property="updated_at",
    *     description="updated_at",
    *     type="string",
    *     format="date-time"
    *   )
    *  )
    *)
    *
    */
      protected $fillable = ['name', 'category_id', 'creator_id'];

      public function category()
      {
        return $this->belongsTo(Category::class);
      }
      public function user(){
        return $this->belongsTo(User::class, 'creator_id');
      }

}
