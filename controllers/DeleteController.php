<?php

class DeleteController extends BaseController
{

    public function __construct(string $area)
    {
        parent::__construct($area);
        $this->view = 'table';

    }

    public function invoke($getData, $postData): Response
    {
        try {
            $message = '';
            if ($this->area === 'employee') {
                (new Employee())->deleteObjectById($getData['id']);
            } elseif ($this->area === 'car') {
                (new Car())->deleteObjectById($getData['id']);
            } elseif ($this->area === 'rental') {
                (new Rental())->deleteObjectById($getData['id']);
            }

        } catch(PDOException $e) {
            if(substr($e->getMessage(), 0, 15) === 'SQLSTATE[23000]'){
                $message = 'Ich kann keinen ' . $this->area . ' löschen, der noch in der Tabelle Ausleihe steht.';
                
            }

        } catch (Exception $e) {
            
            throw new Exception($e);
        }
        try {
            $array = TableHelper::getAllObjectsByArea($this->area);
        } catch (Error $e) {
            throw new Exception($e);
        }
        
        $r = new Response($array);
        $r->setMessage($message);
        return $r; 
    }
}