<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

namespace gradereport_coifish;

use core_privacy\tests\provider_testcase;
use gradereport_coifish\privacy\provider;

/**
 * Privacy provider tests for the CoIFish grade report.
 *
 * @package    gradereport_coifish
 * @copyright  2026 South African Theological Seminary (ict@sats.ac.za)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @covers     \gradereport_coifish\privacy\provider
 */
final class privacy_provider_test extends provider_testcase {
    /**
     * Test that the provider implements the metadata provider interface.
     */
    public function test_metadata_provider(): void {
        $this->assertInstanceOf(
            \core_privacy\local\metadata\provider::class,
            new provider()
        );
    }

    /**
     * Test that the provider implements the plugin provider interface.
     */
    public function test_plugin_provider(): void {
        $this->assertInstanceOf(
            \core_privacy\local\request\plugin\provider::class,
            new provider()
        );
    }

    /**
     * Test that the provider implements the userlist provider interface.
     */
    public function test_userlist_provider(): void {
        $this->assertInstanceOf(
            \core_privacy\local\request\core_userlist_provider::class,
            new provider()
        );
    }

    /**
     * Test that metadata is returned.
     */
    public function test_get_metadata(): void {
        $collection = new \core_privacy\local\metadata\collection('gradereport_coifish');
        $collection = provider::get_metadata($collection);
        $items = $collection->get_collection();
        $this->assertNotEmpty($items);
    }
}
