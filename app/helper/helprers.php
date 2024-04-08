<?php

function upladeFile($image )
{
  $imagepath =$image->store('uploads','public');
  return $imagepath;
}
function upladeMaltiFile($images)
{
    foreach($images as $image){
        $imagepath =$image->store('uploads','public');
    }
    return $imagepath;
}