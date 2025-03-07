<?php

/**
 * @copyright Copyright (c) Metaways Infosystems GmbH, 2011
 * @license LGPLv3, http://www.arcavias.com/en/license
 */

return array(
	'item' => array(
		'delete' => '
			DELETE FROM "mshop_product_stock"
			WHERE :cond AND siteid = ?
		',
		'insert' => '
			INSERT INTO "mshop_product_stock" (
				"prodid", "siteid", "warehouseid", "unitid", "stocklevel", 
				"backdate", "mtime", "editor", "ctime"
			) VALUES (
				?, ?, ?, ?, ?, ?, ?, ?, ?
			)
		',
		'update' => '
			UPDATE "mshop_product_stock"
			SET "prodid" = ?, "siteid" = ?, "warehouseid" = ?, "unitid" = ?,
				"stocklevel" = ?, "backdate" = ?, "mtime" = ?, "editor" = ?
			WHERE "id" = ?
		',
		'search' => '
			SELECT DISTINCT mprost."id", mprost."prodid", mprost."siteid",
				mprost."warehouseid", mprost."unitid", mprost."stocklevel", 
				mprost."backdate", mprost."mtime", mprost."editor",
				mprost."ctime"
			FROM "mshop_product_stock" AS mprost
			:joins
			WHERE :cond
			/*-orderby*/ ORDER BY :order /*orderby-*/
			LIMIT :size OFFSET :start
		',
		'count' => '
			SELECT COUNT(*) AS "count"
			FROM (
				SELECT DISTINCT mprost."id"
				FROM "mshop_product_stock" AS mprost
				:joins
				WHERE :cond
				LIMIT 10000 OFFSET 0
			) AS list
		',
		'stocklevel' => '
			UPDATE "mshop_product_stock"
			SET "stocklevel" = "stocklevel" + ?, "mtime" = ?, "editor" = ?
			WHERE :cond
		',
	),
);
