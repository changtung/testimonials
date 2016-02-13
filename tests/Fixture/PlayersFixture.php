<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PlayersFixture
 *
 */
class PlayersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'team_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'match_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'primary_squad' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'name' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'squad_number' => ['type' => 'string', 'length' => 3, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'yellow' => ['type' => 'string', 'length' => 3, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'red' => ['type' => 'string', 'length' => 3, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'substitution' => ['type' => 'string', 'length' => 3, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'goals' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'rating' => ['type' => 'string', 'length' => 2, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'assist' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'penalty_failed' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'penalty_keeped' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'injuries' => ['type' => 'string', 'length' => 2, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'team_key' => ['type' => 'index', 'columns' => ['team_id'], 'length' => []],
            'match_key' => ['type' => 'index', 'columns' => ['match_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'match_key' => ['type' => 'foreign', 'columns' => ['match_id'], 'references' => ['matches', 'id'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
            'team_key' => ['type' => 'foreign', 'columns' => ['team_id'], 'references' => ['teams', 'id'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'team_id' => 1,
            'match_id' => 1,
            'primary_squad' => 1,
            'name' => 'Lorem ipsum dolor sit amet',
            'squad_number' => 'L',
            'yellow' => 'L',
            'red' => 'L',
            'substitution' => 'L',
            'goals' => 'Lorem ipsum dolor sit amet',
            'rating' => '',
            'assist' => 'Lorem ipsum dolor sit amet',
            'penalty_failed' => 'Lorem ipsum dolor sit amet',
            'penalty_keeped' => 'Lorem ipsum dolor sit amet',
            'injuries' => ''
        ],
    ];
}
