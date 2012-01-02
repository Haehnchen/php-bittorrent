<?php
/**
 * PHP BitTorrent
 *
 * Copyright (c) 2011-2012, Christer Edvartsen <cogo@starzinger.net>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to
 * deal in the Software without restriction, including without limitation the
 * rights to use, copy, modify, merge, publish, distribute, sublicense, and/or
 * sell copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * * The above copyright notice and this permission notice shall be included in
 *   all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS
 * IN THE SOFTWARE.
 *
 * @package Tracker
 * @subpackage Request\Containers
 * @author Christer Edvartsen <cogo@starzinger.net>
 * @copyright Copyright (c) 2011-2012, Christer Edvartsen <cogo@starzinger.net>
 * @license http://www.opensource.org/licenses/mit-license MIT License
 * @link https://github.com/christeredvartsen/php-bittorrent
 */

namespace PHP\BitTorrent\Tracker\Request;

/**
 * Header container
 *
 * This container contains HTTP headers along with some methods for normalizing the header names.
 *
 * @package Tracker
 * @subpackage Request\Containers
 * @author Christer Edvartsen <cogo@starzinger.net>
 * @copyright Copyright (c) 2011-2012, Christer Edvartsen <cogo@starzinger.net>
 * @license http://www.opensource.org/licenses/mit-license MIT License
 * @link https://github.com/christeredvartsen/php-bittorrent
 */
class HeaderContainer extends ParameterContainer {
    /**
     * Class constructor
     *
     * @param array $parameters Parameters to store in the container
     */
    public function __construct(array $parameters = array()) {
        foreach ($parameters as $key => $value) {
            $this->set($key, $value);
        }
    }

    /**
     * Normalize the header name
     *
     * @param string $name The name to normalize, for instance "IF_MODIFIED_SINCE"
     * @return string The normalized name, for instance "if-modified-since"
     */
    private function getName($name) {
        return strtolower(str_replace('_', '-', $name));
    }

    /**
     * @see PHP\BitTorrent\Tracker\Request\ParameterContainerInterface::set()
     */
    public function set($key, $value) {
        return parent::set($this->getName($key), $value);
    }

    /**
     * @see PHP\BitTorrent\Tracker\Request\ParameterContainerInterface::get()
     */
    public function get($key, $default = null) {
        return parent::get($this->getName($key), $default);
    }

    /**
     * @see PHP\BitTorrent\Tracker\Request\ParameterContainerInterface::remove()
     */
    public function remove($key) {
        return parent::remove($this->getName($key));
    }

    /**
     * @see PHP\BitTorrent\Tracker\Request\ParameterContainerInterface::has()
     */
    public function has($key) {
        return parent::has($this->getName($key));
    }
}
