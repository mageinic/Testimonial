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

namespace MageINIC\Testimonial\Ui\Component\Listing\Column;

use Magento\Ui\Component\Listing\Columns\Column;

/**
 * Class for Status.
 */
class Status extends Column
{
    /**
     * @inheritdoc
     */
    public function prepareDataSource(array $dataSource): array
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as $key => $items) {
                $status = $items['enable'];

                $statusLabel = '';
                $severityClass = '';
                $style = '';
                switch ($status) {
                    case 0:
                        $statusLabel = __('Disabled');
                        $severityClass = 'grid-severity-critical';
                        break;
                    case 1:
                        $statusLabel = __('Enabled');
                        $severityClass = 'grid-severity-notice';
                        break;
                    case 2:
                        $statusLabel = __('Pending');
                        $severityClass = 'grid-severity-minor';
                        $style = 'background: #F0E68C';
                        break;
                }

                $html = '<span class="' . $severityClass . '" style="border-radius: 18px;' . $style . '">';
                $html .= '<span>' . $statusLabel . '</span>';
                $html .= '</span>';

                $dataSource['data']['items'][$key]['enable'] = $html;
            }
        }

        return $dataSource;
    }
}
