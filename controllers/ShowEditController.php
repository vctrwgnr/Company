<?php

class ShowEditController extends BaseController
{
    /**
     * @var ?int
     */
    private int $id;

    public function __construct(string $area)
    {
        parent::__construct($area);
        $this->view = 'edit';
    }

    public function invoke($getData, $postData): Response
    {
        try {
            if (isset($getData['id'])) {
                if ($this->area === 'employee') {
                    $array = (new Employee())->getObjectById($getData['id']);
                } elseif ($this->area === 'car') {
                    $array = (new Car())->getObjectById($getData['id']);
                } elseif ($this->area === 'rental') {
                    $array = (new Rental())->getObjectById($getData['id']);
                }
                $r = new Response([$array]);
                $r->setAction('update');
                return $r;
            }
            $r = new Response([]);
            $r->setAction('insert');
            return $r;
        } catch (Error $e) {
            throw new Exception($e);
        }
    }

    // public function getId(): int
    // {
    //     return $this->id;
    // }

}