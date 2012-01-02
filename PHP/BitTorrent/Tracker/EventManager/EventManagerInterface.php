<?php
/**
 * PHP BitTorrent
 *
 * Copyright (c) 2011-2012 Christer Edvartsen <cogo@starzinger.net>
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
 * @package Interfaces
 * @subpackage EventManager
 * @author Christer Edvartsen <cogo@starzinger.net>
 * @copyright Copyright (c) 2011-2012, Christer Edvartsen
 * @license http://www.opensource.org/licenses/mit-license MIT License
 * @link https://github.com/christeredvartsen/php-bittorrent
 */

namespace PHP\BitTorrent\Tracker\EventManager;

/**
 * Event manager interface
 *
 * @package Interfaces
 * @subpackage EventManager
 * @author Christer Edvartsen <cogo@starzinger.net>
 * @copyright Copyright (c) 2011-2012, Christer Edvartsen
 * @license http://www.opensource.org/licenses/mit-license MIT License
 * @link https://github.com/christeredvartsen/php-bittorrent
 */
interface EventManagerInterface {
    /**
     * Attach a callable to an event
     *
     * @param array|string $events The event(s) to attach to
     * @param callback $callback Code that will be called when the event is triggered
     * @param int $priority Priority of the callback
     * @throws InvalidArgumentException
     * @return PHP\BitTorrent\Tracker\EventManager\EventManagerInterface
     */
    function attach($events, $callback, $priority = 1);

    /**
     * Attach a listener to the event manager
     *
     * @param PHP\BitTorrent\Tracker\EventManager\ListenerInterface $listener The listener to attach
     * @param int $priority Priority of the callback
     * @return PHP\BitTorrent\Tracker\EventManager\EventManagerInterface
     */
    function attachListener(ListenerInterface $listener, $priority = 1);

    /**
     * Trigger a given event
     *
     * @param string $event The event to trigger
     * @return PHP\BitTorrent\Tracker\EventManager\EventManagerInterface
     */
    function trigger($event);
}
