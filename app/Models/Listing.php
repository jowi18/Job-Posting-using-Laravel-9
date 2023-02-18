<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Listing extends Model
{
    use HasFactory;

    protected $guarded = [];
    //protected $fillable = ['website', 'title', 'name', 'description', 'company', 'location', 'email', 'tags'];

    public function scopeFilter($query, array $filters){
       if($filters['tag'] ?? false){ 
        $query->where('tags', 'like', '%' . request('tag') . '%' );
       }

       if($filters['search'] ?? false){
        $query->where('title', 'like', '%' . request('search') . '%')
           ->orWhere('description', 'like', '%' . request('search') . '%')
           ->orWhere('tags', 'like', '%' . request('search') . '%')
           ->orWhere('company', 'like', '%' . request('search') . '%');
           
       }

    
    }

     public function user(){
        return $this->belongsTo(User::class, 'user_id');
       }
       
}
