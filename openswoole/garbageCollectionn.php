<?php


// maybe its depracated
$variablename= "string"; 
// In php we have two things associated with a variable and the variable is put in a container called zval, 
// Now, this variable is assigned with is_ref and refcount, when refcount is zero then garbage collector is allowed to free this  
// xdebug_debug_zval('variablename');
//
$a = array('one');
$a[] = & $a;

// now we will have an array with two elements, the second element recursively pointing to itself, that is to itself

unset($a); // now we have an cleanup issue $a is remvoed from the table, but the refernce is not removed it is recursively pointing to itself

// garbage collector is smart enough to deallocate 
// But if this is huge which happens during object creation for a class, the memory goes out of storage


?>
