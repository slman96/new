<?php

function uploadFile($image,$path,$disk )
{
  $imagepath = Storage::disk($disk)->Put($path , $image);
  
  return $imagepath;
}
function uploadMultiFile($images,$path,$disk)
{
    foreach($images as $image){
      $imagepath = Storage::disk($disk)->put($path, $image);
    }
    
    return $imagepath;
}