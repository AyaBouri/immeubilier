<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
class Property extends Model
{
    use HasFactory;
    use SoftDeletes;
    //public $timestamps
    protected $fillable=[
        'title',
        'description',
        'surface',
        'rooms',
        'bedrooms',
        'floor',
        'price',
        'city',
        'address',
        'postal_code',
        'sold'
    ];
    protected $casts=[
        //'created_at'=>'int'
        'sold'=>'boolean'
    ];
    public function options():BelongsToMany{
        return $this->belongsToMany(Option::class);
    }
    public function getSlug():string{
        return Str::slug($this->title);
    }
    public function attachFiles(array $files){
        $pictures=[];
        foreach ($files as $file){
            if($file->getError()){
                continue;
            }
            $filename=$file->store('properties/',$this->id,'public');
            $pictures[]=[
                'filename'=>$filename
            ];
        }
        if(count($pictures)>0){
            return $this->pictures()->createMany($pictures);
        }
    }
    public function getPicture():?Picture{
        return $this->pictures[0]??null;
    }
    public function scopeAvialable(Builder $builder,bool $avaiable=true):Builder{
        return $builder->where('sold',!$avaiable);
    }
    public function scopeRequest(Builder $builder){
        return $builder->orderBy('created_at','desc');
    }
    public function scopeRecent(Builder $builder):Builder{
        return $builder->orderBy('created_at','desc');
    }
}
