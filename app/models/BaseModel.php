<?php
namespace Thistle\App\Model;

use App\Core\Provider\Model\Model;

/**
 * ------------------------------------------------------------
 * Class BaseModel
 * ------------------------------------------------------------
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @package App\Model
 * @since 0.0.2
 */
class BaseModel extends Model
{
    protected $clause;
    protected $values;
    protected $query;
    protected $sql;

    public function __construct($db)
    {
        parent::__construct($db);
        $this->setSql('SELECT * FROM %s WHERE %s');
    }

    /**
     * ------------------------------------------------------------
     * Get Table Name
     * ------------------------------------------------------------
     *
     * Inherited from App\Core\Provider\Repository abstract method.
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.2
     *
     * @return string
     */
    public function getTableName()
    {
        return '';
    }

    /**
     * ------------------------------------------------------------
     * Find By
     * ------------------------------------------------------------
     *
     * Finds All rows by a set criteria
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.2
     *
     * @param array $criteria
     * @param array|null $orderBy
     * @param null $limit
     * @param null $offset
     *
     * @return array
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {

        $this->setValues($criteria);
        $this->setQuery($criteria);
        $this->setClause($criteria, $orderBy, $limit, $offset);

        return $this->db->fetchAll(sprintf($this->getSql(), $this->getTableName(), $this->getClause()), $this->getValues());
    }

    /**
     * ------------------------------------------------------------
     * Find One By
     * ------------------------------------------------------------
     *
     * Returns one row.
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.2
     *
     * @param array $criteria
     * @param array|null $orderBy
     * @param null $limit
     * @param null $offset
     * @return array
     */
    public function findOneBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        $this->setValues($criteria);
        $this->setQuery($criteria);
        $this->setClause($criteria, $orderBy, $limit, $offset);

        return $this->db->fetchAssoc(sprintf($this->getSql(), $this->getTableName(), $this->getClause()), $this->getValues());
    }

    /**
     *------------------------------------------------------------
     * Clause Setter
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.2
     *
     * @param array $query
     * @param array|null $orderBy
     * @param null $limit
     * @param null $offset
     */
    public function setClause(array $query, array $orderBy = null, $limit = null, $offset = null)
    {
        $clause = implode(' AND ', $this->getQuery());
        $clause .= ($orderBy !== null) ? sprintf(' ORDER BY %s %s', key($orderBy), $orderBy[key($orderBy)]) : '';
        $clause .= ($limit !== null) ? sprintf(' LIMIT %s', $limit) : '';
        $clause .= ($offset !== null) ? sprintf(' OFFSET %s', $offset) : '';
        $this->clause = $clause;
    }

    /**
     * ------------------------------------------------------------
     * Clause Getter
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.2
     *
     * @return string
     */
    public function getClause()
    {
        return $this->clause;
    }

    /**
     * ------------------------------------------------------------
     * Value Setter
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.2
     *
     * @param array $criteria
     */
    public function setValues(array $criteria)
    {
        $values = [];
        foreach ($criteria as $columns => $value) {
            $values[] = $value;
        }

        $this->values = $values;
    }

    /**
     * ------------------------------------------------------------
     * Value Getter
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.2
     *
     * @return array
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * ------------------------------------------------------------
     * Query Setter
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.2
     *
     * @param array $criteria
     */
    public function setQuery(array $criteria)
    {
        $query = [];
        foreach ($criteria as $column => $value) {
            $query[] = sprintf('%s = ?', $column);
        }

        $this->query = $query;
    }

    /**
     * ------------------------------------------------------------
     * Query Getter
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.2
     *
     * @return array
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * ------------------------------------------------------------
     * SQL Setter
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.2
     *
     * @param string $sql
     */
    public function setSql($sql)
    {
        $this->sql = $sql;
    }

    /**
     * ------------------------------------------------------------
     * SQL Getter
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.2
     *
     * @return string
     */
    public function getSql()
    {
        return $this->sql;
    }
}