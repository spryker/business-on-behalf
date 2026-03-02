<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerTest\Zed\BusinessOnBehalf;

use Codeception\Actor;
use Spryker\Shared\Kernel\Transfer\AbstractTransfer;

/**
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = null)
 *
 * @SuppressWarnings(PHPMD)
 */
class BusinessOnBehalfBusinessTester extends Actor
{
    use _generated\BusinessOnBehalfBusinessTesterActions;

    public function assertTransferEquals(AbstractTransfer $expected, AbstractTransfer $actual, string $message = ''): void
    {
        $expectedArray = $expected->toArray();
        $actualArray = $actual->toArray();

        $this->assertEquals($expectedArray, $actualArray, $message);
    }
}
