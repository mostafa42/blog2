<?php

use Illuminate\Http\Request;

// create
function create($model, $data)
{
    $model_path = $model::create($data);
    return $model_path;
}

function update($model , $id , $data){
    return $model::find($id)->update($data) ;
}

function show($model , $id)
{
    $data = $model::find($id);
    if(!$data){
        return false ;
    }
    return $data ;
}

// destroy
function delete($model , $id)
{
    $model_path = $model::find($id)->delete();

    return true ;
}

/**
 * last value in $modal array should be base model
 * key that will foreign key of other tables
 */
function delete_tree($modals , $key , $id)
{
    for( $index = 0 ; $index < count($modals) ; $index++ ){
        if( $index != count($modals)-1 ){
            $value = $modals[$index]::where($key , $id)->get();
            
            if(count($value) > 0){
                foreach($value as $val){
                    $val->delete();
                }
            }
            
        }else if( $index == count($modals) - 1 ){
            $modals[$index]::find($id)->delete();
        }
    }

    return true ;
    
}

function update_tree($modals , $key , $id , $data)
{
    $items = $modals::where($key , $id)->get()  ;

    if( count($items) > 0 ){
        foreach( $items as $item ){
            $item->update($data) ;
        }
    }

    return true ;
}
