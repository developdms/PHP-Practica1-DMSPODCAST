<?php

/**
 * Description of ListItem
 *
 * @author MARTIN
 */
class ListItem {

    private $user, $name, $category, $date, $url, $img = '../storage/img/unknown.png', $access;

    function __construct($user = NULL, $name = NULL, $category = NULL, $date = NULL, $url = NULL, $img = NULL, $access = NULL) {
        $this->user = $user;
        $this->name = $name;
        $this->category = $category;
        $this->date = $date;
        $this->url = $url;
        if ($img !== NULL) {
            $this->img = $img;
        }
        $this->access = $access;
    }

    public function getUser() {
        return $this->user;
    }

    public function getName() {
        return $this->name;
    }

    public function getCategory() {
        return $this->category;
    }

    public function getDate() {
        return $this->date;
    }

    public function getUrl() {
        return $this->url;
    }

    public function getImg() {
        return $this->img;
    }

    public function getAccess() {
        return $this->access;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setCategory($category) {
        $this->category = $category;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function setImg($img) {
        $this->img = $img;
    }

    public function setAccess($access) {
        $this->status = $access;
    }

    function render() {
        $aux = 'PB';
        if($this->access === 'PV'){ 
            $aux = 'red';
        }
        return "<button name=single value=" . $this->url . " class='song $aux'>
                <img src=$this->img class=front />
                <label>$this->name</label>
                <label>$this->category</label>
                <label>$this->user</label>
                </button>";
    }

    function renderTable($param = NULL) {
        if ($param === 1) {
            return "<tr>"
                    . "<td>"
                    . "<img src=$this->img class=icon />"
                    . "</td>"
                    . "<td>$this->name</td>"
                    . "<td>"
                    . "<button class=icon name='filedelete' value=$this->url><img src=../storage/img/delete-icon.png /><h4>Eliminar canción</h4></button>"
                    . "</td></tr>";
        }
    }

}
