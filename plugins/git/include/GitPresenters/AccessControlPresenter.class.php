<?php
/**
 * Copyright (c) Enalean, 2015. All rights reserved
 *
 * This file is a part of Tuleap.
 *
 * Tuleap is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * Tuleap is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Tuleap. If not, see <http://www.gnu.org/licenses/
 */

class GitPresenters_AccessControlPresenter {

    public $label_read;

    public $label_write;

    public $label_rw;

    public $is_control_limited;

    public $limited_control_notice;

    public $read_select_box_id;

    public $write_select_box_id;

    public $rewrite_select_box_id;

    public $read_options;

    public $write_options;

    public $rewrite_options;

    public function __construct(
        $is_control_limited,
        $read_select_box_id,
        $write_select_box_id,
        $rewrite_select_box_id,
        $read_options,
        $write_options,
        $rewrite_options
    ) {
        $this->is_control_limited     = $is_control_limited;
        $this->limited_control_notice = $GLOBALS['Language']->getText('plugin_git', 'permissions_on_remote_server');

        $this->label_read  = $GLOBALS['Language']->getText('plugin_git', 'perm_R');
        $this->label_write = $GLOBALS['Language']->getText('plugin_git', 'perm_W');
        $this->label_rw    = $GLOBALS['Language']->getText('plugin_git', 'perm_W+');

        $this->read_select_box_id    = $read_select_box_id;
        $this->write_select_box_id   = $write_select_box_id;
        $this->rewrite_select_box_id = $rewrite_select_box_id;

        $this->read_options    = $read_options;
        $this->write_options   = $write_options;
        $this->rewrite_options = $rewrite_options;
    }
}

