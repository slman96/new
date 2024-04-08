<?php

function upladeFile($image,$path )
{
  $imagepath = Storage::putFile($path,$image);
  return $imagepath;
}
function upladeMaltiFile($images,$path)
{
    foreach($images as $image){
        $imagepath = Storage::putFile($path,$image);
    }
    return $imagepath;
}