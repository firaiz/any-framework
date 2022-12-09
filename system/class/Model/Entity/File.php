<?php
namespace Service\Model\Entity;

use Doctrine\DBAL\Exception;
use Doctrine\DBAL\ParameterType;
use Firaiz\Ufl\Model;

/**
 * Class Test
 * @package Service\Model\Entity
 *
 * new Test();
 * access to tests table
 */

/**
 * @property string name
 * @property string path
 * @property string createdAt
 * @property string updatedAt
 * @property string deletedAt
 */
class File extends Model
{

    public static function getFiles()
    {
        $qb = static::builder();

        try {
            $row = $qb->select('*')
                ->from(static::tableName())
                ->where('id BETWEEN :startId AND :endId')
                ->setParameter('startId', 10)
                ->setParameter('endId', 11)
                ->executeQuery()->fetchAssociative();
        } catch (Exception $e) {
        }
        return static::import($row);
    }
}