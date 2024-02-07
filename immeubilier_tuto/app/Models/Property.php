<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Str;
class Property extends Model
{
    use HasFactory;
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
}
