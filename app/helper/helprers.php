<?php

function upladeFile($image,$path )
{
  $imagepath =$image->store($path,'public');
  return $imagepath;
}
function upladeMaltiFile($images,$path)
{
    foreach($images as $image){
        $imagepath =$image->store($path,'public');
    }
    return $imagepath;
}