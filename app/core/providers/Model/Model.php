<?php
namespace App\Core\Provider\Model;

use Doctrine\DBAL\Connection;

/**
 * ------------------------------------------------------------
 * Abstract Class Model
 * ------------------------------------------------------------
 *
 * Represents a base Repository.
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @package App\Core\Provider\Model
 * @since 0.0.2
 */
abstract class Model
{
    /**
     * @return string
     */
    abstract public function getTableName();

    /**
     * @var Doctrine\DBAL\Connection
     */
    public $db;

    /**
     *
     * @param Doctrine\DBAL\Connection $db
     */
    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    /**
     * ------------------------------------------------------------
     * Insert
     * ------------------------------------------------------------
     *
     * Inserts a table row with specified data.
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.2
     *
     * @param array $data An associative array containing column-value pairs.
     *
     * @return integer The number of affected rows.
     *
     */
    public function insert(array $data)
    {
        return $this->db->insert($this->getTableName(), $data);
    }

    /**
     * ------------------------------------------------------------
     * Update
     * ------------------------------------------------------------
     *
     * Executes an SQL UPDATE statement on a table.
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.2
     *
     * @param array $identifier The update criteria. An associative array containing column-value pairs.
     * @param array $types Types of the merged $data and $identifier arrays in that order.
     *
     * @return integer The number of affected rows.
     */
    public function update(array $data, array $identifier)
    {
        return $this->db->update($this->getTableName(), $data, $identifier);
    }

    /**
     * ------------------------------------------------------------
     * Delete
     * ------------------------------------------------------------
     *
     * Executes an SQL DELETE statement on a table.
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.2
     *
     * @param array $identifier The deletion criteria. An associateve array containing column-value pairs.
     *
     * @return integer The number of affected rows.
     */
    public function delete(array $identifier)
    {
        return $this->db->delete($this->getTableName(), $identifier);
    }

    /**
     * ------------------------------------------------------------
     * Find
     * ------------------------------------------------------------
     *
     * Returns a record by supplied id
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.2
     * 
     * @param mixed $id 
     * @return array
     */
    public function find($id)
    {
        return $this->db->fetchAssoc(sprintf('SELECT * FROM %s WHERE id = ? LIMIT 1', $this->getTableName()), array((int) $id));
    }

    /**
     * ------------------------------------------------------------
     * Find All
     * ------------------------------------------------------------
     *
     * Returns all records from this repository's table
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.2
     *
     * @return array
     */
    public function findAll()
    {
        return $this->db->fetchAll(sprintf('SELECT * FROM %s', $this->getTableName()));
    }
}
