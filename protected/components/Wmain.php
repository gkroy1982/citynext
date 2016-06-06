<?php
class Wmain extends CWidget
{
    public $view;
    public function init()
    {
    	parent::init();
    }
    public function run()
    {
    	$this->render($this->view);
    }
}