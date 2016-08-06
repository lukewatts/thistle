<?php
/**
 * Created by PhpStorm.
 * User: LukeWatts85
 * Date: 06/08/2016
 * Time: 10:04
 */

namespace Thistle\App\Core\Provider\Password;

/**
 * ------------------------------------------------------------
 * Class Password
 * ------------------------------------------------------------
 *
 * Handles password hashing and verifying. Also finds the most
 * appropriate cost value for the current server resources.
 *
 * @package Thistle\App\Core\Provider\Password
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.7
 */
class Password
{
    /**
     * Excryption to be used when hashing passwords
     *
     * @var int
     */
    protected $encryption = PASSWORD_BCRYPT;

    /**
     * The higher the cost the harder a password will be to decrypt
     *
     * @var int
     */
    protected $cost = 10;

    /**
     * Tolerance is used to determine the appropriate password hashing cost
     *
     * @var float
     */
    protected $tolerance = 0.05;

    /**
     * The unencrypted/plain text password
     *
     * @var
     */
    protected $plain_password;

    /**
     * The encrypted/hashed password
     *
     * @var
     */
    protected $hashed_password;

    /**
     * ------------------------------------------------------------
     * Set Appropriate Cost
     * ------------------------------------------------------------
     *
     * Finds the most appropriate cost for the current server
     * configuration and set it using self::setCost().
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.7
     */
    public function setAppropriateCost()
    {
        $tolerance = $this->getTolerance(); // 50 milliseconds

        $cost = $this->getCost();
        do {
            $cost++;
            $start = microtime(true);
            password_hash("test", $this->getEncryption(), ["cost" => $cost]);
            $end = microtime(true);
        } while (($end - $start) < $tolerance);

        $this->setCost($cost);
    }

    /**
     * ------------------------------------------------------------
     * Make
     * ------------------------------------------------------------
     *
     * creates a new password hash using a strong one-way hashing
     * algorithm. Also detects the most appropriate cost to use
     * for the current server configuration.
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.7
     *
     * @param $plain_password
     * @param bool $optimize_cost
     * @return $this
     */
    public function make($plain_password, $auto_optimize_cost = true)
    {
        if ($auto_optimize_cost) $this->setAppropriateCost();

        $this->setPlainPassword($plain_password);

        $this->setHashedPassword(password_hash($this->getPlainPassword(), $this->getEncryption(), ['cost' => $this->getCost()]));

        return $this->getHashedPassword();
    }

    /**
     * ------------------------------------------------------------
     * Verify
     * ------------------------------------------------------------
     *
     * Verifies that the given hash matches the given password.
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.7
     *
     * @param $plain_password
     * @param $hashed_password
     * @return bool
     */
    public function verify($plain_password, $hashed_password)
    {
        $this->setPlainPassword($plain_password);
        $this->setHashedPassword($hashed_password);

        return password_verify($this->getPlainPassword(), $this->getHashedPassword());
    }

    /**
     * ------------------------------------------------------------
     * Info
     * ------------------------------------------------------------
     *
     * When passed in a valid hash created by an algorithm
     * supported by password_hash(), this function will return an
     * array of information about that hash.
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.7
     *
     * @param $hash
     * @return array
     */
    public function info($hash)
    {
        $this->setHashedPassword($hash);

        return password_get_info($this->getHashedPassword());
    }

    /**
     * ------------------------------------------------------------
     * Set Encryption
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.7
     *
     * @param int $encryption
     */
    public function setEncryption($encryption)
    {
        $this->encryption = $encryption;
    }

    /**
     * ------------------------------------------------------------
     * Get Encryption
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.7
     *
     * @return int
     */
    public function getEncryption()
    {
        return $this->encryption;
    }

    /**
     * ------------------------------------------------------------
     * Set Cost
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.7
     *
     * @param int $cost
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
    }

    /**
     * ------------------------------------------------------------
     * Get Cost
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.7
     *
     * @return int
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * ------------------------------------------------------------
     * Set Tolerance
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.7
     *
     * @param float $tolerance
     */
    public function setTolerance($tolerance)
    {
        $this->tolerance = $tolerance;
    }

    /**
     * ------------------------------------------------------------
     * Get Tolerance
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.7
     *
     * @return float
     */
    public function getTolerance()
    {
        return $this->tolerance;
    }

    /**
     * ------------------------------------------------------------
     * Set Plain Password
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.7
     *
     * @param mixed $plain_password
     */
    public function setPlainPassword($plain_password)
    {
        $this->plain_password = $plain_password;
    }

    /**
     * ------------------------------------------------------------
     * Get Plain Password
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.7
     *
     * @return mixed
     */
    public function getPlainPassword()
    {
        return $this->plain_password;
    }

    /**
     * ------------------------------------------------------------
     * Set Hashed Password
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.7
     *
     * @param mixed $hashed_password
     */
    public function setHashedPassword($hashed_password)
    {
        $this->hashed_password = $hashed_password;
    }

    /**
     * ------------------------------------------------------------
     *
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.7
     *
     * @return mixed
     */
    public function getHashedPassword()
    {
        return $this->hashed_password;
    }
}