<?php
namespace FalkRoeder\DatedNews\Property\TypeConverters;

use TYPO3\CMS\Extbase\Property\TypeConverter\PersistentObjectConverter;

class ApplicationPersistentObjectConverter extends PersistentObjectConverter {

    /**
     * @var string
     */
    protected $targetType = 'FalkRoeder\\DatedNews\\Domain\\Model\\Application';

    /**
     * @var int
     */
    protected $priority = 2;

    /**
     * Fetch an object from persistence layer.
     *
     * @param mixed $identity
     * @param string $targetType
     * @throws \TYPO3\CMS\Extbase\Property\Exception\TargetNotFoundException
     * @throws \TYPO3\CMS\Extbase\Property\Exception\InvalidSourceException
     * @return object
     */
    protected function fetchObjectFromPersistence($identity, $targetType) {
        if (ctype_digit((string)$identity)) {
            $query = $this->persistenceManager->createQueryForType($targetType);
            $query->getQuerySettings()
                ->setIgnoreEnableFields(TRUE)
                ->setRespectStoragePage(FALSE);
            $constraints = $query->equals('uid', $identity);
            $object = $query->matching($constraints)->execute()->getFirst();
        } else {
            throw new \TYPO3\CMS\Extbase\Property\Exception\InvalidSourceException('The identity property "' . $identity . '" is no UID.', 1297931020);
        }

        if ($object === NULL) {
            throw new \TYPO3\CMS\Extbase\Property\Exception\TargetNotFoundException('Object with identity "' . print_r($identity, TRUE) . '" not found.', 1297933823);
        }

        return $object;
    }

}