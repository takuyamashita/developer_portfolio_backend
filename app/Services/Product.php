<?php

namespace App\Services;

use App\Models\Product as ModelsProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

interface ProductService {

    public function store(FormRequest $request);

    public function update(FormRequest $request, Model $product);

    public function destory();
}

class Product implements ProductService {

    public function store(FormRequest $request){

        $validatedData = $request->validated();

        if($request->has('main_image')){

            $path = Storage::putFile('/public/product/image', $request->file('main_image'),'private');
            
            unset($validatedData['main_image']);
    
            $validatedData['main_image_path'] = $path;
        }
        


        ModelsProduct::create($validatedData);
    }

    public function update(FormRequest $request, Model $product){

        $validatedData = $request->validated();

        if($request->has('main_image')){

            $path = Storage::putFile('/public/product/image', $request->file('main_image'),'private');
            
            unset($validatedData['main_image']);
    
            $validatedData['main_image_path'] = $path;
        }

        $product->fill($validatedData);
        $product->save();
    }

    public function destory(){
        
    }
}