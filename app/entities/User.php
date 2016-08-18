<?php
namespace Thistle\Entity;

/**
 * ------------------------------------------------------------
 * Class User
 * ------------------------------------------------------------
 *
 * @package Thistle\Entity
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.6
 *
 * @Entity
 * @Table(name="users")
 */
class User {
    /**
     * @var
     *
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private $id;

    /**
     * @var
     *
     * @Column(type="string")
     */
    private $name;

    /**
     * @var
     *
     * @Column(type="string")
     */
    private $username;

    /**
     * @var
     *
     * @Column(type="string")
     */
    private $email;

    /**
     * @var
     *
     * @Column(type="string", length=60)
     */
    private $password;

    /**
     * @var
     *
     * @Column(type="datetime")
     */
    private $created_at;

    /**
     * @var
     *
     * @Column(type="datetime")
     */
    private $updated_at;

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $updated_at
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
}
