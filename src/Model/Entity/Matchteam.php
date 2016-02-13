<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Matchteam Entity.
 *
 * @property int $id
 * @property string $name
 * @property string $clubname
 * @property \Cake\I18n\Time $matchdate
 * @property string $formation
 * @property string $goals
 * @property \App\Model\Entity\Guest[] $guests
 * @property \App\Model\Entity\Host[] $hosts
 */
class Matchteam extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
