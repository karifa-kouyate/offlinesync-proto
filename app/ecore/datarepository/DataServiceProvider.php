<?php
 
namespace Ecore\DataRepository;
 
use Illuminate\Support\ServiceProvider;
 
class DataServiceProvider extends ServiceProvider{
    public function register() {
        $this->app->bind('datarepository', function() {
            return new Store();
        });
    }
}
