<?php
 
namespace Ecore\DataRepository;
 
use Illuminate\Support\Facades\Facade;
 
class Data extends Facade{
    protected static function getFacadeAccessor() { return 'datarepository'; }
}