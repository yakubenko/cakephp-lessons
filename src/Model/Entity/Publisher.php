<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Publisher Entity
 *
 * @property int $id
 * @property string $title
 * @property string $logotype
 * @property string $description
 *
 * @property \App\Model\Entity\Book[] $books
 */
class Publisher extends Entity
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
        'title' => true,
        'logotype' => true,
        'description' => true,
        'books' => true
    ];
}
