<?php

function uploadFile($image,$path,$disk )
{
  $imageName = $image->getClientOriginalName();
  $imagepath = Storage::disk($disk);
  $imagepath = Storage::putFileAs($path ,$image, $imageName);
  
  return $imagepath;
}
function uploadMultiFile($images,$path,$disk)
{
    foreach($images as $image){
      $imageName = $image->getClientOriginalName();
      $imagepath = Storage::disk($disk);
      $imagepath = Storage::putFileAs($path ,$image, $imageName);
    }
    
    return $imagepath;
}