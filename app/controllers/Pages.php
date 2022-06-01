<?php
class Pages extends Controller
{

    public function index()
    {
        $viewPath = VIEWS_PATH . 'pages/Index.php';
        require_once $viewPath;
        $indexView = new Index($this->getModel(), $this);
        $indexView->output();
    }

    public function about()
    {
        $viewPath = VIEWS_PATH . 'pages/About.php';
        require_once $viewPath;
        $aboutView = new About($this->getModel(), $this);
        $aboutView->output();
    }
    public function search(){

        $viewPath = VIEWS_PATH . 'pages/search.php';
        require_once $viewPath;
        $searchView = new search($this->getModel(), $this);
        $searchView->output();

    }
    public function fetch(){

        $viewPath = VIEWS_PATH . 'pages/fetch.php';
        require_once $viewPath;
        $fetchView = new fetch($this->getModel(), $this);
        $fetchView->output();

    }
    public function admin(){

        $viewPath = VIEWS_PATH . 'pages/admin.php';
        require_once $viewPath;
        $adminView = new admin($this->getModel(), $this);
        $adminView->output();

    }


}
