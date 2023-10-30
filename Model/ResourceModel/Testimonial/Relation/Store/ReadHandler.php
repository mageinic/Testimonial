<?php
/**
 * MageINIC
 * Copyright (C) 2023 MageINIC <support@mageinic.com>
 *
 * NOTICE OF LICENSE
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see https://opensource.org/licenses/gpl-3.0.html.
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category MageINIC
 * @package MageINIC_Testimonial
 * @copyright Copyright (c) 2023 MageINIC (https://www.mageinic.com/)
 * @license https://opensource.org/licenses/gpl-3.0.html GNU General Public License,version 3 (GPL-3.0)
 * @author MageINIC <support@mageinic.com>
 */

namespace MageINIC\Testimonial\Model\ResourceModel\Testimonial\Relation\Store;

use Exception;
use MageINIC\Testimonial\Model\ResourceModel\Testimonial;
use Magento\Framework\EntityManager\Operation\ExtensionInterface;
use Magento\Framework\Exception\LocalizedException;

/**
 * Class Read Handler for StoreId.
 */
class ReadHandler implements ExtensionInterface
{
    /**
     * @var Testimonial
     */
    protected Testimonial $resourceTestimonial;

    /**
     * ReadHandler Constructor.
     *
     * @param Testimonial $resourceTestimonial
     */
    public function __construct(
        Testimonial $resourceTestimonial
    ) {
        $this->resourceTestimonial = $resourceTestimonial;
    }

    /**
     * Perform action on relation/extension attribute.
     *
     * @param object $entity
     * @param array $arguments
     * @return object
     * @throws LocalizedException|Exception
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function execute($entity, $arguments = []): object
    {
        if ($entity->getId()) {
            $stores = $this->resourceTestimonial->lookupStoreIds((int)$entity->getId());
            $entity->setData('store_id', $stores);
        }
        return $entity;
    }
}
