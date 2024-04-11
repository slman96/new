<?php

function uploadFile($image,$path )
{
  $imagepath = Storage::putFile($path,$image);
  
  return $imagepath;
}
function uploadMultiFile($images,$path)
{
    foreach($images as $image){
        $imagepath = Storage::putFile($path,$image);
    }
    return $imagepath;
}