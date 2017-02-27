<?php
namespace branding\LolitaFramework\Configuration\Modules;

use \branding\LolitaFramework\Configuration\Configuration;
use \branding\LolitaFramework\Configuration\IModule;
use \branding\LolitaFramework\Core\Arr;

class RemoveFilters extends Filters
{

    /**
     * Add shortcodes
     *
     * @author Guriev Eugen <gurievcreative@gmail.com>
     * @return Filters instance.
     */
    protected function install()
    {
        foreach ($this->data as $data) {
            remove_filter($data[0], $data[1], $data[2]);
        }
        return $this;
    }

    /**
     * Prepare data
     *
     * @author Guriev Eugen <gurievcreative@gmail.com>
     * @return Filters instance.
     */
    protected function prepare()
    {
        foreach ($this->data as &$data) {
            // Priority
            $data[2] = Arr::get($data, 2, 10);
        }
        return $this;
    }
}
