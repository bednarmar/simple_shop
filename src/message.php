<?php

class Message {

    private $userId;
    private $adminId;
    private $orderStatus;
    private $text;
    private $connetion;

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getAdminId()
    {
        return $this->adminId;
    }

    /**
     * @param mixed $adminId
     */
    public function setAdminId($adminId)
    {
        $this->adminId = $adminId;
    }

    /**
     * @return mixed
     */
    public function getOrderStatus()
    {
        return $this->orderStatus;
    }

    /**
     * @param mixed $orderStatus
     */
    public function setOrderStatus($orderStatus)
    {
        $this->orderStatus = $orderStatus;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */


    public function __construct(Connect_db $conn) {
        $this->connection=$conn;

    }

    public function usersByStatus ($orderStatus)
    {
        $rows = array();
        $conn=$this->connection;
        $sql = "SELECT user_id FROM order WHERE orderStatus='$orderStatus'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0){
            while($row = $result->fetch_row()) {
                $rows[]=$row;
            }

        }
    }
    public function dateOfUsers ($rows)
    {
        $posts = array();
        foreach ($rows as userId){
        $conn = $this->connection;
        $sql = "SELECT name,surname,email FROM user WHERE id='$userId'";
        $result = $conn->query($sql);
            while ($allUsers = mysqli_fetch_object($result)) {
                $posts[] = array('name' => $allUsers->name, 'surname' => $allUsers->surname, 'email' => $allUsers->email);
            }
        return $posts;
        }

    }
    public function sendMessage($post,$text)
    {
        $posts = $post;
        foreach ($posts as $key => $list){
            echo "<tr valign='top'>\n";
            echo "<td>".$list['name'] ."</td>\n";
            echo "<td>".$list['surname'] ."</td>\n";
            echo "<td>".$list['email'] ."</td>\n";
            echo "<td>".$text"</td>\n";
            echo "</tr>\n";
        }
    }
}

