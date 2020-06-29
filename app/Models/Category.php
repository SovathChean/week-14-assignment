<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\User;

class Category extends Model
{
  /**
  *
  * @SWG\Definition(
  *  definition="Category",
  *  required={"label", "name"},
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
  *
  *
  *
  *
  */
    protected $fillable = ['name'];

    public function post(){
      return $this->hasMany(Post::class);
    }

}
