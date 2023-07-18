<?php
    namespace app\controllers;
    use League\Plates\Engine;
    use Exception;


    class controller{

        static function GerarViews(String $view){
            try{

                $PathViews = dirname(__file__,2) . '/views';

                if(!file_exists($PathViews .'/'. $view . '.php')){
                    throw new Exception('View não existe');
                }

                $template = new Engine($PathViews);
                echo $template->render($view);

            }
            catch(Exception $e){
                echo $e->getMessage();
            }
        }
    }