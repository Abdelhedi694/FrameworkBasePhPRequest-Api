<?php

namespace Models;



class Message extends AbstractModel implements \JsonSerializable
{
    protected string $nomDeLaTable = "messages";
    private $id;
    private $author;
    private $content;
    /**
 * @return mixed
 */public function getId()
{
    return $this->id;
}/**
 * @return mixed
 */public function getAuthor()
{
    return $this->author;
}/**
 * @param mixed $author
 */public function setAuthor($author): void
{
    $this->author = $author;
}/**
 * @return mixed
 */public function getContent()
{
    return $this->content;
}/**
 * @param mixed $content
 */public function setContent($content): void
{
    $this->content = $content;
}

    public function jsonSerialize()
    {
        return [
            "author"=>$this->author,
            "content"=>$this->content,
            "id"=>$this->id
        ];
    }


    public function save(Message $message):void
    {
        $sql = $this->pdo->prepare("INSERT INTO {$this->nomDeLaTable} 
             (content, author) VALUES (:content,:author)
            ");

        $sql->execute([
            'content'=>$message->content,
            'author'=>$message->author
        ]);

    }


}