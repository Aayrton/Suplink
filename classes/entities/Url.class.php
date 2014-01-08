<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ayrton
 * Date: 21/02/13
 * Time: 00:43
 * To change this template use File | Settings | File Templates.
 */
class Ur
{
    private $id;
    private $userId;
    private $name;
    private $url;
    private $shortened_url;
    private $date_created;

    function __construct($id, $date_created, $name, $shortened_url, $url, $userId)
    {
        $this->id = $id;
        $this->date_created = $date_created;
        $this->name = $name;
        $this->shortened_url = $shortened_url;
        $this->url = $url;
        $this->userId = $userId;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setDateCreated($date_created)
    {
        $this->date_created = $date_created;
    }

    public function getDateCreated()
    {
        return $this->date_created;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setShortenedUrl($shortened_url)
    {
        $this->shortened_url = $shortened_url;
    }

    public function getShortenedUrl()
    {
        return $this->shortened_url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function getUserId()
    {
        return $this->userId;
    }


}
