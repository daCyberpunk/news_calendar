<?php
namespace FR\NewsCalendar\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 Falk Röder <mail@falk-roeder.de>
 *  			
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Test case for class FR\NewsCalendar\Controller\NewsController.
 *
 * @author Falk Röder <mail@falk-roeder.de>
 */
class NewsControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \FR\NewsCalendar\Controller\NewsController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('FR\\NewsCalendar\\Controller\\NewsController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllNewssFromRepositoryAndAssignsThemToView() {

		$allNewss = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$newsRepository = $this->getMock('FR\\NewsCalendar\\Domain\\Repository\\NewsRepository', array('findAll'), array(), '', FALSE);
		$newsRepository->expects($this->once())->method('findAll')->will($this->returnValue($allNewss));
		$this->inject($this->subject, 'newsRepository', $newsRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('newss', $allNewss);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenNewsToView() {
		$news = new \FR\NewsCalendar\Domain\Model\News();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('news', $news);

		$this->subject->showAction($news);
	}
}
