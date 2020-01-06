<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Message {
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $msg_id;
    /**
     * @ORM\Column(type="text", length="550")
     */
    protected $msg_text;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="messages")
     */
    protected $user_id;
    /**
     * @ORM\Column(type="datetime")
     */
    protected $msg_time;

    /**
     * @return mixed
     */
    public function getMsgId()
    {
        return $this->msg_id;
    }

    /**
     * @param mixed $msg_id
     */
    public function setMsgId($msg_id)
    {
        $this->msg_id = $msg_id;
    }

    /**
     * @return mixed
     */
    public function getMsgText()
    {
        return $this->msg_text;
    }

    /**
     * @param mixed $msg_text
     */
    public function setMsgText($msg_text)
    {
        $this->msg_text = $msg_text;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getMsgTime()
    {
        return $this->msg_time;
    }

    /**
     * @param mixed $msg_time
     */
    public function setMsgTime($msg_time)
    {
        $this->msg_time = $msg_time;
    }

}