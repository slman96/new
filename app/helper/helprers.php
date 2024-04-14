<?php

function uploadFile($image,$path )
{
  $iamgename = $image->getClientOriginalName();
  $imagepath = Storage::disk('local')->put($path . '/' . $iamgename , $image);
  
  return $imagepath;
}
function uploadMultiFile($images,$path)
{
    foreach($images as $image){
      $iamgename = $image->getClientOriginalName();
      $imagepath = Storage::disk('local')->put($path . '/' . $iamgename , $image);
    }
    
    return $imagepath;
}