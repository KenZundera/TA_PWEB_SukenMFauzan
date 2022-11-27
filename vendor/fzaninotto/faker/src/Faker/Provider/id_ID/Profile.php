<?php

namespace Faker\Provider\id_ID;

class Profile extends \Faker\Provider\Base
{
    /**
     * @var array some email domains
     */
    protected static $sword = [
        'Basic Sword',
        'Wooden Sword',
        'Apple Sword',
        'Zombie Sword',
        'Ruby Sword',
        'Banana Sword',
        'Epic Sword',
        'Ruby Sword',
        'Unicorn Sword',
        'Hair Sword',
        'Coin Sword',
        'Elecrtronical Sword',
        'Edgy Sword',
        'Ultra-Edgy Sword',
        'Omega Sword',
        'Ultra-Omega Sword',
    ];

    /**
     * General tld and local tld
     *
     * @link http://idwebhost.com/
     * @link http://domain.id/
     */
    protected static $armor = [
        'Basic Armor',
        'Fish Armor',
        'Wolf Armor',
        'Eye Armor',
        'Banana Armor',
        'Epic Armor',
        'Ruby Armor',
        'Coin Armor',
        'Mermaid Armor',
        'Elecrtronical Armor',
        'Edgy Armor',
        'Ultra-Edgy Armor',
        'Omega Armor',
        'Ultra-Omega Armor',
    ];

    /**
     * Return sword for user
     *
     * @access public
     * @return string sword
     */
    public static function sword()
    {
        return static::randomElement(static::$sword);
    }

    /**
     * Return armor for user
     *
     * @access public
     * @return string armor
     */
    public static function armor()
    {
        return static::randomElement(static::$armor);
    }
}
