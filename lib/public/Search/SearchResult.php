<?php

declare(strict_types=1);

/**
 * @copyright 2020 Christoph Wurst <christoph@winzerhof-wurst.at>
 *
 * @author 2020 Christoph Wurst <christoph@winzerhof-wurst.at>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace OCP\Search;

/**
 * Class SearchResult
 *
 * @since 20.0.0
 */
final class SearchResult {

	/** @var bool */
	private $isPaginated;

	/** @var ASearchResultEntry[] */
	private $entries;
	/**
	 * @var null
	 */
	private $cursor;

	/**
	 * SearchResult constructor.
	 *
	 * @param bool $isPaginated
	 * @param ASearchResultEntry[] $entries
	 */
	private function __construct(bool $isPaginated, array $entries, $cursor = null) {
		$this->isPaginated = $isPaginated;
		$this->entries = $entries;
		$this->cursor = $cursor;
	}

	/**
	 * @param ASearchResultEntry[] $entries
	 *
	 * @return static
	 */
	public static function complete(array $entries): self {
		return new self(
			false,
			$entries
		);
	}

	/**
	 * @param ASearchResultEntry[] $entries
	 * @param int|string $cursor
	 *
	 * @return static
	 */
	public static function paginated(array $entries,
									 $cursor): self {
		return new self(
			true,
			$entries,
			$cursor
		);
	}

}
