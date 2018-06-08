<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Writer Entity
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $middlename
 * @property string $photo
 * @property string $bio
 * @property int $year_b
 * @property int $year_d
 *
 * @property \App\Model\Entity\Book[] $books
 * @property \App\Model\Entity\Category[] $categories
 */
class Writer extends Entity
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
        'firstname' => true,
        'lastname' => true,
        'middlename' => true,
        'photo' => true,
        'bio' => true,
        'year_b' => true,
        'year_d' => true,
        'books' => true,
        'categories' => true
    ];
}
