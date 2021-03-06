#!/usr/share/codendi/src/utils/php-launcher.sh
<?php
/**
 * Copyright (c) Enalean, 2012 - 2015. All Rights Reserved.
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
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Tuleap. If not, see <http://www.gnu.org/licenses/>.
 */

require_once 'pre.php';

if ($argc < 5) {
    echo <<< EOT
Usage: $argv[0] project_id admin_user_name --tracker_id tracker_id
Dump a project structure to XML format

EOT;
    exit(1);
}

$project = ProjectManager::instance()->getProject($argv[1]);
if ($project && ! $project->isError() && ! $project->isDeleted()) {
    try {
        $xml_exporter = new ProjectXMLExporter(
            EventManager::instance(),
            new UGroupManager(),
            new XML_RNGValidator(),
            new UserXMLExporter(UserManager::instance()),
            new ProjectXMLExporterLogger()
        );

        $options = array(
            'tracker_id' => $argv[4]
        );

        $user = UserManager::instance()->forceLogin($argv[2]);

        echo $xml_exporter->export($project, $options, $user);

        exit(0);
    } catch (XML_ParseException $exception) {
        fwrite(STDERR, "*** PARSE ERROR: ".$exception->getIndentedXml().PHP_EOL);
        foreach ($exception->getErrors() as $parse_error) {
            fwrite(STDERR, "*** PARSE ERROR: ".$parse_error.PHP_EOL);
        }
        fwrite(STDERR, "RNG path: ". $exception->getRngPath() . PHP_EOL);
        exit(1);
    } catch (Exception $exception) {
        fwrite(STDERR, "*** ERROR: ".$exception->getMessage().PHP_EOL);
        exit(1);
    }
} else {
    echo "*** ERROR: Invalid project_id\n";
    exit(1);
}