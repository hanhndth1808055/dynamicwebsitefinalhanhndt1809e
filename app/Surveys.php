<?php


namespace App;


class Surveys
{
    protected $table = 'surveys';

    public function __construct($name, $email, $telephone, $feedback)
    {
        $this->name = $name;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->feedback = $feedback;
    }

    function listSurveys()
    {
        $surveys = [];
        $surveys[] = new Surveys("Tran Van A", "atran@gmail.com", "09876789", "Good!");
        $surveys[] = new Surveys("Tran Van B", "btran@gmail.com", "098767891", "Very Good!");

        return $surveys;
    }

    function save()
    {

    }

    function update()
    {

    }

    function delete()
    {

    }
}
