<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nette\Utils\Image;

class Picture extends Model
{
    protected $fillable = ['title', 'description', 'url'];
    //Méthode de manipulation d'image
    public function resize($width,$height){
        $imagePath=public_path($this->url);
        if(file_exists($imagePath)){
            Image::make($imagePath)->resize($width,$height,function ($constrain){
                $constrain->aspectRatio();//conserver le ratio d'aspect de l'image
                $constrain->upsize(); // ne pas agrandir l'image s'elle est plus petite que les dimension spécifiés
            })->save();//enregistrer l'image redimensionnée
        }
    }
    //Méthode de validation d'image
    public function isValid(){
        // Récupérer le chemin de l'image
        $imagePath = public_path($this->url); // Supposons que l'URL stockée dans la base de données est relative au dossier public
        // Vérifier si le fichier existe
        if (file_exists($imagePath)) {
            // Vérifier le format de l'image
            $allowedFormats = ['jpg', 'jpeg', 'png', 'gif'];
            $imageInfo = pathinfo($imagePath);
            $imageExtension = strtolower($imageInfo['extension']);
            if (!in_array($imageExtension, $allowedFormats)) {
                return false; // Le format de l'image n'est pas pris en charge
            }
            // Vérifier la taille de l'image
            $maxFileSize = 5 * 1024 * 1024; // 5 Mo (en octets)
            $fileSize = filesize($imagePath);
            if ($fileSize > $maxFileSize) {
                return false; // La taille de l'image dépasse la limite maximale
            }
            // Vérifier la dimension de l'image
            list($width, $height) = getimagesize($imagePath);
            if ($width < 100 || $height < 100) {
                return false; // Les dimensions de l'image sont inférieures à la taille minimale requise
            }
            // L'image est valide
            return true;
        }
        // Le fichier d'image n'existe pas
        return false;
    }
}
