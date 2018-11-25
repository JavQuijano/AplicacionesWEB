<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 11/22/2018
 * Time: 10:21 PM
 */

class database
{
    private $Server_Name = "localhost";
    private $username = "root";
    private $password= "root";

    /**
     * @return string
     */
    public function getServerName()
    {
        return $this->Server_Name;
    }

    /**
     * @param string $Server_Name
     */
    public function setServerName($Server_Name)
    {
        $this->Server_Name = $Server_Name;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
    
}