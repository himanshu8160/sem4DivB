<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\models\categoryModel;
class categoryImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        // foreach($collection as $record){

        // }
        for($i=1;$i < count($collection);$i++){
            $category= new categoryModel();
            $category->name=$collection[$i][0];
            $category->description=$collection[$i][1];
            $category->save();
        }
    }
}
