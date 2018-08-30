<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Book Entity
 *
 * @property int $id
 * @property int $publisher_id
 * @property string $uid
 * @property string $title
 * @property string $cover
 * @property string $description
 * @property int $year
 *
 * @property \App\Model\Entity\Publisher $publisher
 * @property \App\Model\Entity\Category[] $categories
 * @property \App\Model\Entity\Writer[] $writers
 */
class Book extends Entity
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
        'publisher_id' => true,
        'uid' => true,
        'title' => true,
        'cover' => true,
        'description' => true,
        'year' => true,
        'publisher' => true,
        'categories' => true,
        'writers' => true
    ];
}
