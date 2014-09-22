<?php

class Category {
    private $id;
    private $order;
    private $name;
    private $boards;

    function __construct() {
         $boards[]=array();
    }

    public function addBoard($board)
    {
        if (is_null($this->boards)) {
            $this->boards=$board;
        }
        else {
        array_push($this->boards,$board);
        }
        //$boards[] = $board;
    }
    public function getBoards()
    {
        return $this->boards;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }

    public function setOrder($order)
    {
        $this->order = $order;
    }
    public function getOrder()
    {
        return $this->order;
    }

}

class Board {
    private $id;
    private $name;
    private $description;
    private $order;
    private $topics;

    function __construct() {
        $topics[]=array();
    }

    public function addTopic($topic)
    {
        if (is_null($this->topics)) {
            $this->topics=$topic;
        }
        else {
            array_push($this->topics,$topic);
        }
    }
    public function getTopics()
    {
        return $this->topics;
    }
    public function getNumberOfTopics() {
        return sizeof($this->topics);
    }



    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function getDescription()
    {
        return $this->description;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }

    public function setOrder($order)
    {
        $this->order = $order;
    }
    public function getOrder()
    {
        return $this->order;
    }


}

class Post {
    protected $author;
    protected $dateAndTime;
    protected $content;
    protected $id;

    public function setAuthor($author)
    {
        $this->author = $author;
    }
    public function getAuthor()
    {
        return $this->author;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }
    public function getContent()
    {
        return $this->content;
    }

    public function setDateAndTime($dateAndTime)
    {
        $this->dateAndTime = $dateAndTime;
    }
    public function getDateAndTime()
    {
        return $this->dateAndTime;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }

}

class Topic extends Post {
    private $boardId;
    private $title;
    private $replies;

    function __construct() {
        $replies[]=array();
    }

    public function addReply($reply)
    {
        if (is_null($this->replies)) {
            $this->replies=$reply;
        }
        else {
            array_push($this->replies,$reply);
        }
    }
    public function getReplies()
    {
        return $this->replies;
    }
    public function getNumberOfReplies() {
        return sizeof($this->replies);
    }

    public function setBoardId($boardId)
    {
        $this->boardId = $boardId;
    }
    public function getBoardId()
    {
        return $this->boardId;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function getTitle()
    {
        return $this->title;
    }


}

class Reply extends Post {
    private $topicId;

    public function setTopicId($topicId)
    {
        $this->topicId = $topicId;
    }
    public function getTopicId()
    {
        return $this->topicId;
    }
}


?>