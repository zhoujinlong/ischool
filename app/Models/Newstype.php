<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;

class Newstype extends Model
{
    use ModelTree, AdminBuilder;

    protected $fillable = ['title', 'parent_id', 'order'];
}
